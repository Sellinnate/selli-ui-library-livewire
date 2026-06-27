@props([
    'align' => 'start',
])
<div {{ $attributes->class(['selli-popover']) }} x-data="{ open: false }" @click.outside="open = false" @keydown.escape="open = false">
    <div class="selli-dropdown__trigger" @click="open = ! open" :aria-expanded="open">
        {{ $trigger }}
    </div>
    <div class="selli-popover__panel selli-popover__panel--{{ $align }}" x-show="open" x-cloak x-transition.origin.top>
        {{ $slot }}
    </div>
</div>
