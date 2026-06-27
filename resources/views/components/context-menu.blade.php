@props([])
<div
    {{ $attributes->class(['selli-dropdown']) }}
    x-data="{ open: false, x: 0, y: 0 }"
    @contextmenu.prevent="open = true; x = $event.offsetX; y = $event.offsetY"
    @click.outside="open = false"
    @keydown.escape="open = false"
    style="display:block;"
>
    {{ $trigger }}
    <div class="selli-dropdown__panel" x-show="open" x-cloak x-transition :style="`left:${x}px;top:${y}px;`">
        <x-selli::menu>{{ $slot }}</x-selli::menu>
    </div>
</div>
