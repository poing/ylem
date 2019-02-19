<?php
namespace Ylem\Test\Models;

use Orchestra\Testbench\TestCase;

abstract class AbstractTest extends TestCase
{

    //$this->withFactories(__DIR__.'/factories');

    protected function getPackageProviders($app)
    {
        return ['\Poing\Ylem\YlemServiceProvider'];
    }

}
