<?php

namespace Selli\Ui\Tests;

use Orchestra\Testbench\TestCase as Orchestra;
use Selli\Ui\SelliUiServiceProvider;

class TestCase extends Orchestra
{
    protected function getPackageProviders($app)
    {
        return [
            SelliUiServiceProvider::class,
        ];
    }

    public function getEnvironmentSetUp($app)
    {
        config()->set('database.default', 'testing');
    }
}
