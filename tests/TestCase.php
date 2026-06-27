<?php

namespace Selli\Ui\Tests;

use Illuminate\Support\Facades\Blade;
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

    /**
     * Compile and render a Blade string with the `x-selli::*` components
     * available, returning the raw HTML string.
     */
    protected function render(string $template, array $data = []): string
    {
        return Blade::render($template, $data);
    }
}
