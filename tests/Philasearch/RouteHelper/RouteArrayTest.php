<?php

use Philasearch\RouteHelper\RouteArray as RouteArray;

class RouteArrayTest extends TestCase
{
    private $routeArray;

    public function setUp ()
    {
        parent::setUp();

        $this->routeArray = new RouteArray( $this->fixturesPath . '/routes.php' );
    }

    public function testGetRoutes ()
    {
        $expected = [
            'foo' => '/foo'
        ];

        $this->assertEquals( $expected, $this->routeArray->getRoutes() );
    }

    /**
     *  @expectedException Philasearch\RouteHelper\Exceptions\RouteNotFoundException
     */
    public function testMissingGetRoute ()
    {
        $this->routeArray->getRoute( 'foo-missing' );
    }

    public function testGetRoute ()
    {
        $this->assertEquals( '/foo', $this->routeArray->getRoute( 'foo' ) );
    }
}
