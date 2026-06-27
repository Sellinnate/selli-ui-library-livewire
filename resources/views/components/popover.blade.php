@props([
    'align' => 'start',
    'label' => 'Dettagli',
])
@php $panelId = 'selli-pop-'.uniqid(); @endphp
<div
    {{ $attributes->class(['selli-popover']) }}
    x-data="selliDropdown()"
    @click.outside="close(false)"
    @keydown.escape.prevent="close()"
>
    <div
        class="selli-dropdown__trigger"
        x-ref="trigger"
        @click="toggle()"
        :aria-expanded="open"
        aria-haspopup="dialog"
        aria-controls="{{ $panelId }}"
    >
        {{ $trigger }}
    </div>
    <div
        class="selli-popover__panel selli-popover__panel--{{ $align }}"
        id="{{ $panelId }}"
        role="dialog"
        aria-label="{{ $label }}"
        tabindex="-1"
        x-ref="panel"
        x-show="open"
        x-cloak
        x-transition.origin.top
    >
        {{ $slot }}
    </div>
</div>
