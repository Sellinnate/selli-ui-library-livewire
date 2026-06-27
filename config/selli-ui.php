<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default theme
    |--------------------------------------------------------------------------
    |
    | The Selli design system is DARK-FIRST. Set the default appearance the
    | components render with. Either "dark" or "light". A runtime theme
    | switcher (the <x-selli::theme-toggle/> component) can override this in
    | the browser and persist the choice to localStorage.
    |
    */

    'theme' => 'dark',

    /*
    |--------------------------------------------------------------------------
    | Primary brand colour
    |--------------------------------------------------------------------------
    |
    | The key of the colour preset (see "colors" below) applied to
    | `--primary` by default. Electric Violet is the Selli brand colour.
    |
    */

    'primary' => 'violet',

    /*
    |--------------------------------------------------------------------------
    | Density
    |--------------------------------------------------------------------------
    |
    | Controls the control height / padding scale applied through the
    | `--ds-control-*` tokens. One of "comfortable", "compact" or "cozy".
    |
    */

    'density' => 'comfortable',

    /*
    |--------------------------------------------------------------------------
    | Colour presets
    |--------------------------------------------------------------------------
    |
    | Brand colour presets the theme switcher can apply at runtime by
    | overriding the `--primary` CSS custom property.
    |
    */

    'colors' => [
        'violet' => 'oklch(0.65 0.28 290)',
        'blue' => 'oklch(0.55 0.22 258)',
        'emerald' => 'oklch(0.72 0.18 155)',
        'amber' => 'oklch(0.80 0.15 85)',
        'rose' => 'oklch(0.70 0.19 22)',
    ],

];
