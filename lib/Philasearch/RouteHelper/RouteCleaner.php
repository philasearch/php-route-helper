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

        foreach( $params as $key => $value )
        {
            if ( strpos( $dirtyRoute, ":{$key}" ) === false )
            {
                $additional[$key] = $value;
            }
            else
            {
                $dirtyRoute = str_replace( ":{$key}", $value, $dirtyRoute );
            }
        }

        if ( strpos( $dirtyRoute, ":" ) !== false )
        {
            preg_match('/:[a-zA-Z0-9]*/', $dirtyRoute, $param );
            throw new ParamMissing( ltrim($param[0], ':') );
        }

        return $dirtyRoute . '?' . http_build_query( $additional );
    }
}
