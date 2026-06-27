<?php

namespace Selli\Ui;

class SelliUi
{
    /**
     * The semantic version of the Selli UI library.
     */
    public const VERSION = '0.1.0';

    /**
     * Return the absolute URL to the published, combined stylesheet.
     *
     * Use inside a Blade layout: `<link rel="stylesheet" href="{{ SelliUi::css() }}">`.
     */
    public function css(): string
    {
        return asset('vendor/selli-ui/css/selli-ui.css');
    }

    /**
     * Return the absolute URL to the published Alpine helper bundle.
     */
    public function js(): string
    {
        return asset('vendor/selli-ui/js/selli-ui.js');
    }

    /**
     * The list of brand colour presets the theme switcher understands.
     *
     * @return array<string, string>
     */
    public function colors(): array
    {
        return config('selli-ui.colors', [
            'violet' => 'oklch(0.65 0.28 290)',
            'blue' => 'oklch(0.62 0.20 255)',
            'emerald' => 'oklch(0.70 0.17 160)',
            'amber' => 'oklch(0.80 0.16 80)',
            'rose' => 'oklch(0.66 0.22 18)',
            'cyan' => 'oklch(0.72 0.14 220)',
        ]);
    }
}
