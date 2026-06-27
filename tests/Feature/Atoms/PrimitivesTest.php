<?php

it('renders a badge with a tone and icon', function () {
    $html = $this->render('<x-selli::badge tone="success" icon="circle-check">Attivo</x-selli::badge>');

    expect($html)
        ->toContain('selli-badge')
        ->toContain('selli-badge--success')
        ->toContain('<svg')
        ->toContain('Attivo');
});

it('renders an eyebrow with a pulse dot by default', function () {
    expect($this->render('<x-selli::eyebrow>Novità</x-selli::eyebrow>'))
        ->toContain('selli-eyebrow__dot');

    expect($this->render('<x-selli::eyebrow :pulse="false">Novità</x-selli::eyebrow>'))
        ->not->toContain('selli-eyebrow__dot');
});

it('renders a stat block', function () {
    $html = $this->render('<x-selli::stat value="98%" label="Uptime">Affidabilità</x-selli::stat>');

    expect($html)
        ->toContain('selli-stat__value')
        ->toContain('98%')
        ->toContain('Uptime')
        ->toContain('Affidabilità');
});

it('renders a section heading with eyebrow, accent and lead', function () {
    $html = $this->render('<x-selli::section-heading eyebrow="Selli" title="Componenti" accent="enterprise" lead="Pronti." align="center" />');

    expect($html)
        ->toContain('selli-section-heading--center')
        ->toContain('selli-section-heading__accent')
        ->toContain('Componenti')
        ->toContain('enterprise')
        ->toContain('Pronti.');
});

it('renders headings at the requested level', function () {
    $html = $this->render('<x-selli::heading :level="1" :gradient="true">Titolo</x-selli::heading>');

    expect($html)
        ->toContain('<h1')
        ->toContain('selli-heading--1')
        ->toContain('selli-heading--gradient');
});

it('clamps heading levels into the 1-6 range', function () {
    expect($this->render('<x-selli::heading :level="9">x</x-selli::heading>'))->toContain('<h6');
    expect($this->render('<x-selli::heading :level="0">x</x-selli::heading>'))->toContain('<h1');
});

it('renders text with a colour and custom tag', function () {
    $html = $this->render('<x-selli::text as="span" color="brand" size="lg">Ciao</x-selli::text>');

    expect($html)
        ->toContain('<span')
        ->toContain('selli-text--brand')
        ->toContain('var(--text-lg)');
});

it('renders a plain, vertical and labelled separator', function () {
    expect($this->render('<x-selli::separator />'))->toContain('selli-separator');
    expect($this->render('<x-selli::separator :vertical="true" />'))
        ->toContain('selli-separator--vertical')
        ->toContain('aria-orientation="vertical"');
    expect($this->render('<x-selli::separator label="oppure" />'))
        ->toContain('selli-separator--labeled')
        ->toContain('oppure');
});

it('renders avatar initials from a name', function () {
    $html = $this->render('<x-selli::avatar name="Filippo Calabrese" size="lg" status="online" />');

    expect($html)
        ->toContain('selli-avatar--lg')
        ->toContain('FC')
        ->toContain('selli-avatar__status--online');
});

it('renders an avatar image when a src is given', function () {
    $html = $this->render('<x-selli::avatar src="/me.jpg" name="Me" />');

    expect($html)->toContain('<img src="/me.jpg"');
});

it('renders an avatar group with an overflow count', function () {
    $html = $this->render('<x-selli::avatar-group :extra="3"><x-selli::avatar name="A B" /></x-selli::avatar-group>');

    expect($html)
        ->toContain('selli-avatar-group')
        ->toContain('+3');
});

it('renders the brand lockup', function () {
    $html = $this->render('<x-selli::brand text="Selli" />');

    expect($html)
        ->toContain('selli-brand__mark')
        ->toContain('selli-brand__text')
        ->toContain('Selli');
});

it('renders a kbd key', function () {
    expect($this->render('<x-selli::kbd>⌘K</x-selli::kbd>'))
        ->toContain('selli-kbd')
        ->toContain('⌘K');
});

it('renders an accessible spinner', function () {
    expect($this->render('<x-selli::spinner />'))
        ->toContain('selli-spinner')
        ->toContain('role="status"');
});

it('renders a determinate progress bar with aria values', function () {
    $html = $this->render('<x-selli::progress :value="42" label="Caricamento" />');

    expect($html)
        ->toContain('selli-progress__bar')
        ->toContain('width:42%')
        ->toContain('aria-valuenow="42"')
        ->toContain('42%');
});

it('renders an indeterminate progress bar', function () {
    expect($this->render('<x-selli::progress />'))
        ->toContain('selli-progress__bar--indeterminate');
});

it('renders a skeleton with dimensions', function () {
    expect($this->render('<x-selli::skeleton width="120" height="20" />'))
        ->toContain('selli-skeleton')
        ->toContain('width:120px')
        ->toContain('height:20px');

    expect($this->render('<x-selli::skeleton :circle="true" width="40" height="40" />'))
        ->toContain('selli-skeleton--circle');
});

it('renders a pulsing status dot', function () {
    expect($this->render('<x-selli::dot :pulse="true" color="var(--success)" />'))
        ->toContain('selli-dot__ping')
        ->toContain('selli-dot__core');
});

it('renders a tooltip bubble with placement', function () {
    $html = $this->render('<x-selli::tooltip label="Aiuto" placement="bottom"><button>?</button></x-selli::tooltip>');

    expect($html)
        ->toContain('selli-tooltip__bubble--bottom')
        ->toContain('role="tooltip"')
        ->toContain('Aiuto');
});

it('renders callouts for every variant', function (string $variant, string $expectIcon) {
    $html = $this->render(
        '<x-selli::callout :variant="$v" title="T">Body</x-selli::callout>',
        ['v' => $variant],
    );

    expect($html)
        ->toContain('selli-callout')
        ->toContain('selli-callout__title')
        ->toContain('Body');
})->with([
    ['info', 'info'],
    ['brand', 'sparkles'],
    ['success', 'circle-check'],
    ['warning', 'alert-triangle'],
    ['danger', 'alert-circle'],
]);

it('renders a dismissible callout with a close button', function () {
    expect($this->render('<x-selli::callout :dismissible="true">x</x-selli::callout>'))
        ->toContain('selli-callout__dismiss')
        ->toContain('aria-label="Chiudi"');
});
