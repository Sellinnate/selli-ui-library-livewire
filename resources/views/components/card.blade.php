@props([
    'hoverable' => true,
    'glow' => false,
    'accent' => 'violet',
])
<div {{ $attributes->class([
    'selli-card',
    'selli-card--hoverable' => $hoverable,
    'selli-card--glow' => $glow,
    'selli-card--accent-'.$accent => $accent !== 'violet',
]) }}>
    {{ $slot }}
</div>
