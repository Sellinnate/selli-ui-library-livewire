@props([
    'align' => 'start',
])
<div {{ $attributes->class(['selli-dropdown']) }} x-data="{ open: false }" @click.outside="open = false" @keydown.escape="open = false">
    <div class="selli-dropdown__trigger" @click="open = ! open" :aria-expanded="open" aria-haspopup="menu">
        {{ $trigger }}
    </div>
    <div class="selli-dropdown__panel selli-dropdown__panel--{{ $align }}" x-show="open" x-cloak x-transition.origin.top>
        <x-selli::menu>{{ $slot }}</x-selli::menu>
    </div>
</div>
