<?php

/**
 * RouteArray.php
 *
 * @author    Thomas Muntaner thomas.muntaner@gmail.com
 * @copyright 2014 Thomas Muntaner
 * @version   1.0.0
 */

namespace Philasearch\RouteHelper;

/**
 * Class Route
 *
 * This class interfaces with route classes to make routes
 *
 * @package Philasearch\RouteHelper
 */

class Route
{
    private $routeArray;
    private $routeCleaner;
    private $routeJoiner;

    public function __construct ( $routePath, $routeArray = null, $routeCleaner = null, $routeJoiner = null )
    {
        $this->routeArray   = ( $routeArray != null ) ? $routeArray : new RouteArray( $routePath ) ;
        $this->routeCleaner = ( $routeCleaner != null ) ? $routeCleaner : new RouteCleaner();
        $this->routeJoiner  = ( $routeJoiner != null ) ? $routeJoiner : new RouteJoiner();
    }

    public function route ( $name, $params=[] )
    {
        $route = $this->routeArray->getRoute( $name );

        return $this->routeCleaner->makeRoute( $route, $params );
    }

    public function join ( $routes )
    {
        return $this->routeJoiner->join ( $routes );
    }
}
