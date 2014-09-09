<?php

use Philasearch\RouteHelper\RouteJoiner as RouteJoiner;

class RouteJoinerTest extends TestCase
{
    private $routeJoiner;

    public function setUp ()
    {
        parent::setUp();

        $this->routeJoiner = new RouteJoiner();
    }

    /**
     * @dataProvider joinProvider
     */
    public function testJoin ( $expected, $routes )
    {
        $this->assertEquals( $expected, $this->routeJoiner->join( $routes ) );
    }

    /**
     * @dataProvider invalidJoinProvider
     * 
     * @expectedException Philasearch\RouteHelper\Exceptions\InvalidRouteJoinException
     */
    public function testInvalidJoin ( $routes )
    {
        $this->routeJoiner->join( $routes );
    }

    public function joinProvider ()
    {
        return [
            ['/foo/bar', ['/foo', '/bar']],
            ['/foo/bar', ['/foo/', '/bar']],
            ['/foo/bar', ['/foo/', 'bar']],
            ['/foo/bar', ['/foo', 'bar']],
            ['/foob/bar', ['/foob', 'bar']],
        ];
    }

    public function invalidJoinProvider ()
    {
        return [
            [['/foo?', '/bar']],
            [['/foo?bar=foo', '/bar']],
            [['/foo', 'http://bar']],
            [['/foo', 'https://bar']],
        ];
    }
}
