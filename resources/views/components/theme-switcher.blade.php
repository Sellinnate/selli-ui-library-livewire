@props([
    'themes' => null,
])
@php
    // key => label. The first (violet) is the default Selli brand (no data-theme).
    $themes = $themes ?? [
        'violet' => 'Viola',
        'blue' => 'Blu',
        'emerald' => 'Smeraldo',
        'amber' => 'Ambra',
        'rose' => 'Rosa',
        'cyan' => 'Ciano',
    ];
@endphp
<div {{ $attributes->class(['selli-theme-switcher']) }} x-data="selliThemeSwitcher()" @click.outside="open = false" @keydown.escape="open = false">
    <button
        type="button"
        class="selli-theme-toggle selli-focusable"
        @click="open = ! open"
        aria-haspopup="menu"
        :aria-expanded="open"
        aria-label="Cambia colore tema"
    >
        <x-selli::icon name="palette" :size="18" />
    </button>
    <div class="selli-dropdown__panel selli-dropdown__panel--end" x-show="open" x-cloak x-transition.origin.top role="menu">
        <div class="selli-menu">
            <div class="selli-menu__label">Tema colore</div>
            @foreach ($themes as $key => $label)
                <button
                    type="button"
                    class="selli-menu__item"
                    role="menuitemradio"
                    @click="pick('{{ $key }}')"
                    :aria-checked="current === '{{ $key }}'"
                >
                    <span class="selli-swatch selli-swatch--{{ $key }}" aria-hidden="true"></span>
                    <span>{{ $label }}</span>
                    <span class="selli-menu__shortcut" x-show="current === '{{ $key }}'" aria-hidden="true">✓</span>
                </button>
            @endforeach
        </div>
    </div>
</div>
