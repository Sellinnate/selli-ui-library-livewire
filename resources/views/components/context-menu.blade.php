@props([])
@php $panelId = 'selli-ctx-'.uniqid(); @endphp
<div
    {{ $attributes->class(['selli-dropdown']) }}
    x-data="selliDropdown()"
    @contextmenu.prevent="show()"
    @click.outside="close(false)"
    @keydown.escape.prevent="close()"
    @keydown.down.prevent="nav(1)"
    @keydown.up.prevent="nav(-1)"
    style="display:block;"
>
    {{-- The trigger area is focusable so keyboard users can open the menu
         (Shift+F10 / the Menu key fire `contextmenu`; Enter opens too). --}}
    <div
        class="selli-dropdown__trigger"
        x-ref="trigger"
        tabindex="0"
        role="button"
        aria-haspopup="menu"
        :aria-expanded="open"
        aria-controls="{{ $panelId }}"
        @keydown.enter.prevent="toggle()"
        @keydown.space.prevent="toggle()"
        style="display:block;"
    >
        {{ $trigger }}
    </div>
    <div
        class="selli-dropdown__panel"
        id="{{ $panelId }}"
        x-ref="panel"
        x-show="open"
        x-cloak
        x-transition
    >
        <x-selli::menu>{{ $slot }}</x-selli::menu>
    </div>
</div>
