<?php

/**
 * InvalidRouteJoinException.php
 *
 * @author    Thomas Muntaner thomas.muntaner@gmail.com
 * @copyright 2014 Thomas Muntaner
 * @version   1.0.0
 */

namespace Philasearch\RouteHelper\Exceptions;

/**
 * Class InvalidRouteJoinException
 *
 * An exception for route issues
 *
 * @package Philasearch\RouteHelper\Exceptions
 */
class InvalidRouteJoinException extends \Exception
{
    public function __construct( $route1, $route2, $code = 0, Exception $previous = null )
    {
        parent::__construct( "Invalide Route Join: {$route1} with {$route2}", $code, $previous );
    }
}
