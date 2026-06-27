<?php

it('renders a primary button by default', function () {
    $html = $this->render('<x-selli::button>Salva</x-selli::button>');

    expect($html)
        ->toContain('<button')
        ->toContain('selli-btn')
        ->toContain('selli-btn--primary')
        ->toContain('selli-btn--md')
        ->toContain('type="button"')
        ->toContain('Salva');
});

it('renders as an anchor when href is given', function () {
    $html = $this->render('<x-selli::button href="/dashboard" variant="ghost">Vai</x-selli::button>');

    expect($html)
        ->toContain('<a')
        ->toContain('href="/dashboard"')
        ->toContain('selli-btn--ghost');
});

it('supports every documented variant and size', function (string $variant, string $size) {
    $html = $this->render(
        '<x-selli::button :variant="$v" :size="$s">x</x-selli::button>',
        ['v' => $variant, 's' => $size],
    );

    expect($html)
        ->toContain('selli-btn--'.$variant)
        ->toContain('selli-btn--'.$size);
})->with([
    ['primary', 'sm'],
    ['secondary', 'md'],
    ['ghost', 'lg'],
    ['link', 'md'],
    ['blue', 'lg'],
]);

it('renders leading and trailing icons', function () {
    $html = $this->render('<x-selli::button icon="rocket" icon-right="arrow-right">Lancia</x-selli::button>');

    expect($html)
        ->toContain('<svg')
        ->toContain('selli-btn__icon-right');
});

it('disables the button', function () {
    $html = $this->render('<x-selli::button :disabled="true">No</x-selli::button>');

    expect($html)
        ->toContain('disabled')
        ->toContain('aria-disabled="true"');
});

it('adds the pulse animation only on the primary variant', function () {
    expect($this->render('<x-selli::button :pulse="true">Go</x-selli::button>'))
        ->toContain('selli-btn--pulse');

    expect($this->render('<x-selli::button variant="ghost" :pulse="true">Go</x-selli::button>'))
        ->not->toContain('selli-btn--pulse');
});

it('merges custom classes from the consumer', function () {
    $html = $this->render('<x-selli::button class="w-full custom">x</x-selli::button>');

    expect($html)
        ->toContain('selli-btn')
        ->toContain('custom');
});
