<?php

require_once __DIR__ . '/../vendor/autoload.php';

class TestCase extends \PHPUnit_Framework_TestCase
{
    protected $fixturesPath;

    public function setUp ()
    {
        $this->fixturesPath = dirname( __FILE__ ) . '/fixtures';
    }

    public function tearDown ()
    {
        Mockery::close();
    }

    protected function mock ( $object )
    {
        return Mockery::mock( $object );
    }
}
