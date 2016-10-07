<?php

/**
 * RouteCleaner.php
 *
 * @author    Thomas Muntaner thomas.muntaner@gmail.com
 * @copyright 2014 Thomas Muntaner
 * @version   1.0.0
 */

namespace Philasearch\RouteHelper;

use Philasearch\RouteHelper\Exceptions\RouteMissingParameterException as ParamMissing;

/**
 * Class RouteCleaner
 *
 * Cleans the routes and returns
 *
 * @package Philasearch\RouteHelper
 */
class RouteCleaner
{
    public function makeRoute ( $dirtyRoute, $params )
    {
        $additional = [];

        preg_match_all('/:[a-zA-Z0-9]*|:[a-zA-Z0-9]*/', $dirtyRoute, $foundParams );
        $matches = $foundParams[0];

        foreach( $params as $key => $value )
        {
            if ( strpos( $dirtyRoute, ":{$key}" ) === false )
            {
                $additional[$key] = $value;
            }
            else
            {
                $dirtyRoute = str_replace( ":{$key}", $value, $dirtyRoute );
                foreach ( $matches as $paramKey => $paramValue )
                {
                    if ( $paramValue == ":{$key}" )
                    {
                        unset($matches[$paramKey]);
                        break;
                    }
                }
            }
        }

        if ( $matches != [] )
        {
            $keys = array_keys($matches);
            throw new ParamMissing($matches[$keys[0]]);
        }

        return $dirtyRoute . '?' . http_build_query( $additional );
    }
}
