<?php

it('renders a card with icon, title and body sub-components', function () {
    $html = $this->render(<<<'BLADE'
        <x-selli::card>
            <x-selli::card.icon name="sparkles" />
            <x-selli::card.title>Titolo</x-selli::card.title>
            <x-selli::card.body>Contenuto della card.</x-selli::card.body>
        </x-selli::card>
    BLADE);

    expect($html)
        ->toContain('selli-card')
        ->toContain('selli-card--hoverable')
        ->toContain('selli-card__icon')
        ->toContain('selli-card__title')
        ->toContain('selli-card__body')
        ->toContain('Titolo')
        ->toContain('Contenuto della card.');
});

it('forces the lit state with glow', function () {
    expect($this->render('<x-selli::card :glow="true">x</x-selli::card>'))
        ->toContain('selli-card--glow');
});

it('applies the blue accent', function () {
    expect($this->render('<x-selli::card accent="blue">x</x-selli::card>'))
        ->toContain('selli-card--accent-blue');
});

it('can disable hover', function () {
    expect($this->render('<x-selli::card :hoverable="false">x</x-selli::card>'))
        ->not->toContain('selli-card--hoverable');
});
