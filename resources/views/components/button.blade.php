@props([
    'variant' => 'primary',
    'size' => 'md',
    'icon' => null,
    'iconRight' => null,
    'href' => null,
    'as' => null,
    'type' => 'button',
    'disabled' => false,
    'pulse' => false,
    'full' => false,
])
@php
    $tag = $as ?? ($href ? 'a' : 'button');
    $iconSize = $size === 'lg' ? 20 : 16;
    $classes = [
        'selli-btn',
        'selli-btn--'.$variant,
        'selli-btn--'.$size,
        'selli-btn--full' => $full,
        'selli-btn--pulse' => $pulse && $variant === 'primary',
    ];
@endphp
<{{ $tag }}
    {{ $attributes->class($classes) }}
    @if ($tag === 'a')
        href="{{ $disabled ? null : $href }}"
        @if ($disabled) aria-disabled="true" @endif
    @else
        type="{{ $type }}"
        @if ($disabled) disabled aria-disabled="true" @endif
    @endif
>
    @if ($icon)<x-selli::icon :name="$icon" :size="$iconSize" />@endif
    {{ $slot }}
    @if ($iconRight)<x-selli::icon :name="$iconRight" :size="$iconSize" class="selli-btn__icon-right" />@endif
</{{ $tag }}>
