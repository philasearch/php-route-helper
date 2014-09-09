<?php

/**
 * RouteNotFoundException.php
 *
 * @author    Thomas Muntaner thomas.muntaner@gmail.com
 * @copyright 2014 Thomas Muntaner
 * @version   1.0.0
 */

namespace Philasearch\RouteHelper\Exceptions;

/**
 * Class RouteNotFoundException
 *
 * An exception for route issues
 *
 * @package Philasearch\RouteHelper\Exceptions
 */
class RouteNotFoundException extends \Exception
{
    public function __construct( $code = 0, Exception $previous = null )
    {
        parent::__construct( 'Route Not Found', $code, $previous );
    }
}
