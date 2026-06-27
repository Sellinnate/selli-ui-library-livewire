@props([
    'name' => null,
    'color' => 'var(--primary)',
])
<div {{ $attributes->class(['selli-card__icon']) }}>
    @if ($name)
        <x-selli::icon :name="$name" :size="24" :color="$color" />
    @else
        {{ $slot }}
    @endif
</div>
