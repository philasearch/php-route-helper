<?php

/**
 * RouteJoiner.php
 *
 * @author    Thomas Muntaner thomas.muntaner@gmail.com
 * @copyright 2014 Thomas Muntaner
 * @version   1.0.0
 */

namespace Philasearch\RouteHelper;

use Philasearch\RouteHelper\Exceptions\InvalidRouteJoinException as InvalidJoin;

/**
 * Class RouteJoiner
 *
 * This class joins multiple routes together
 *
 * @package Philasearch\RouteHelper
 */
class RouteJoiner
{
    private $invalidJoin1 = ['?', '&', '='];
    private $invalidJoin2 = ['http', 'https'];

    public function join ( $routes )
    {
        $routeString = '';

        foreach ( $routes as $route )
            $routeString = $this->appendRoute( $routeString, $route );

        return $routeString;
    }

    private function appendRoute ( $routeString, $route )
    {
        if ( !$this->isValidJoin( $routeString, $route) )
            throw new InvalidJoin( $routeString, $route );

        if ( ( substr( $routeString, -1) == substr( $route, 0,1 ) ) && substr( $route, 0,1 ) == '/' ) // check /+/
            return $routeString . substr( $route, 1 );

        if ( (substr( $routeString, -1) != '/') && substr( $route, 0,1 ) != '/' ) // check if no / between the two routes
            return $routeString . '/' . $route;

        return $routeString . $route;
    }

    private function isValidJoin ( $route1, $route2 )
    {
        // check first route
        foreach ( $this->invalidJoin1 as $invalid )
        {
            if ( strpos( $route1, $invalid ) !== false )
                return false;
        }

        foreach ( $this->invalidJoin2 as $invalid )
        {
            if ( strpos( $route2, $invalid ) !== false )
                return false;
        }

        return true;
    }
}
