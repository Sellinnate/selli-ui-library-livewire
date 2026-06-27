<?php

use Selli\Ui\Facades\SelliUi;

it('renders the colour theme switcher with all six themes', function () {
    $html = $this->render('<x-selli::theme-switcher />');

    expect($html)
        ->toContain('selli-theme-switcher')
        ->toContain('selliThemeSwitcher()')
        ->toContain('aria-haspopup="menu"')
        ->toContain("pick('violet')")
        ->toContain("pick('blue')")
        ->toContain("pick('emerald')")
        ->toContain("pick('amber')")
        ->toContain("pick('rose')")
        ->toContain("pick('cyan')")
        ->toContain('role="menuitemradio"')
        ->toContain('selli-swatch--emerald');
});

it('accepts a custom theme list', function () {
    $html = $this->render(
        '<x-selli::theme-switcher :themes="$t" />',
        ['t' => ['violet' => 'Brand', 'blue' => 'Ocean']],
    );

    expect($html)->toContain('>Brand</span>')->toContain('>Ocean</span>')
        ->not->toContain("pick('amber')");
});

it('exposes six colour presets via the facade', function () {
    $colors = SelliUi::colors();

    expect($colors)->toHaveKeys(['violet', 'blue', 'emerald', 'amber', 'rose', 'cyan']);
});

it('the app shell includes both the colour switcher and the light/dark toggle', function () {
    $html = $this->render('<x-selli::app-shell title="x">y</x-selli::app-shell>');

    expect($html)
        ->toContain('selli-theme-switcher')
        ->toContain('selli-theme-toggle');
});
