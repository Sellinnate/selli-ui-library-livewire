<?php

use Selli\Ui\Icons;

it('renders a known icon as inline svg', function () {
    $html = $this->render('<x-selli::icon name="rocket" />');

    expect($html)
        ->toContain('<svg')
        ->toContain('viewBox="0 0 24 24"')
        ->toContain('stroke-linecap="round"')
        ->toContain('aria-hidden="true"');
});

it('renders an accessible title when provided', function () {
    $html = $this->render('<x-selli::icon name="bell" title="Notifiche" />');

    expect($html)
        ->toContain('role="img"')
        ->toContain('aria-label="Notifiche"')
        ->toContain('<title>Notifiche</title>');
});

it('exposes 119 icons via the Icons class', function () {
    expect(Icons::names())->toHaveCount(119)
        ->and(Icons::has('rocket'))->toBeTrue()
        ->and(Icons::has('not-a-real-icon'))->toBeFalse()
        ->and(Icons::path('not-a-real-icon'))->toBeNull();
});

it('renders nothing dangerous for an unknown icon name', function () {
    $html = $this->render('<x-selli::icon name="nope" />');

    expect($html)->toContain('<svg');
});
