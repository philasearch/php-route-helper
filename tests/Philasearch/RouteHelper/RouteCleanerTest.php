<?php

use Philasearch\RouteHelper\RouteCleaner as RouteCleaner;

class RouteCleanerTest extends TestCase
{
    private $routeCleaner;

    public function setUp ()
    {
        parent::setUp();

        $this->routeCleaner = new RouteCleaner();
    }

    public function testMakeRoute ()
    {
        $params = ['id' => 'bar', 'param1' => 'foo1', 'param2' => 'foo2'];

        $this->assertEquals( '/foo/bar?param1=foo1&param2=foo2', $this->routeCleaner->makeRoute( '/foo/:id', $params) );
    }

    /**
     *  @expectedException Philasearch\RouteHelper\Exceptions\RouteMissingParameterException
     *  @expectedExceptionMessage Route is missing a required parameter: bar.
     */
    public function testMakeRouteWithOneMissingRequiredParameter ()
    {
        $params = ['id' => 'bar', 'param1' => 'foo1', 'param2' => 'foo2'];

        $this->routeCleaner->makeRoute( '/foo/:id/:bar', $params);
    }
}
