<?php

/**
 * RouteArray.php
 *
 * @author    Thomas Muntaner thomas.muntaner@gmail.com
 * @copyright 2014 Thomas Muntaner
 * @version   1.0.0
 */

namespace Philasearch\RouteHelper;

use Philasearch\RouteHelper\Exceptions\RouteNotFoundException as NotFound;

/**
 * Class RouteArray
 *
 * This class gets the routes from a route file and 
 * returns/finds them.
 *
 * @package Philasearch\RouteHelper
 */
class RouteArray
{
    private $routes;

    public function __construct ( $routePath )
    {
        $this->routes = require $routePath;
    }

    /**
     * Returns all the routes
     * 
     * @return array The routes
     */
    public function getRoutes ()
    {
        return $this->routes;
    }

    /**
     * Returns a route by its name
     * 
     * @param  string $name The name of the route
     * 
     * @return string The Route
     */
    public function getRoute ( $name )
    {
        if ( array_key_exists( $name, $this->routes) )
            return $this->routes[$name];

        throw new NotFound();
    }
}
