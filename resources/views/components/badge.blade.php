@props([
    'tone' => 'violet',
    'icon' => null,
    'dashed' => false,
])
<span {{ $attributes->class([
    'selli-badge',
    'selli-badge--'.$tone,
    'selli-badge--dashed' => $dashed,
]) }}>
    @if ($icon)<x-selli::icon :name="$icon" :size="14" />@endif
    {{ $slot }}
</span>
