<?php

namespace Selli\Ui;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class SelliUiServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * The Selli UI package ships a set of anonymous Blade components
         * (prefixed `x-selli::*`), the design-system CSS tokens and an
         * optional Alpine helper bundle.
         *
         * Views are registered under the `selli` namespace, so the
         * anonymous components in `resources/views/components` become
         * available as `<x-selli::button>`, `<x-selli::card>`, etc.
         */
        $package
            ->name('selli-ui')
            ->hasConfigFile('selli-ui')
            ->hasViews('selli')
            ->hasAssets();
    }

    public function packageBooted(): void
    {
        // Publish the raw design-system CSS tokens and the compiled stylesheet
        // so an application can either link them directly or pull them into its
        // own build pipeline (Vite / Tailwind).
        $this->publishes([
            __DIR__.'/../resources/css' => public_path('vendor/selli-ui/css'),
        ], 'selli-ui-assets');

        // Publish the JavaScript (Alpine helpers) bundle.
        $this->publishes([
            __DIR__.'/../resources/js' => public_path('vendor/selli-ui/js'),
        ], 'selli-ui-assets');
    }
}
