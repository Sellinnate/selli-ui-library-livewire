@props([
    'align' => 'start',
])
@php $panelId = 'selli-dd-'.uniqid(); @endphp
<div
    {{ $attributes->class(['selli-dropdown']) }}
    x-data="selliDropdown()"
    @click.outside="close(false)"
    @keydown.escape.prevent="close()"
    @keydown.down.prevent="nav(1)"
    @keydown.up.prevent="nav(-1)"
>
    <div
        class="selli-dropdown__trigger"
        x-ref="trigger"
        @click="toggle()"
        :aria-expanded="open"
        aria-haspopup="menu"
        aria-controls="{{ $panelId }}"
    >
        {{ $trigger }}
    </div>
    <div
        class="selli-dropdown__panel selli-dropdown__panel--{{ $align }}"
        id="{{ $panelId }}"
        x-ref="panel"
        x-show="open"
        x-cloak
        x-transition.origin.top
    >
        <x-selli::menu>{{ $slot }}</x-selli::menu>
    </div>
</div>
