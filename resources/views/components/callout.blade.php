@props([
    'variant' => 'info',
    'title' => null,
    'icon' => null,
    'dismissible' => false,
])
@php
    $icons = [
        'info' => 'info',
        'brand' => 'sparkles',
        'success' => 'circle-check',
        'warning' => 'alert-triangle',
        'danger' => 'alert-circle',
    ];
    // info & brand share the violet base class.
    $variantClass = in_array($variant, ['success', 'warning', 'danger'], true) ? $variant : null;
    $resolvedIcon = $icon ?? ($icons[$variant] ?? 'info');
@endphp
<div role="status" {{ $attributes->class([
    'selli-callout',
    'selli-callout--'.$variantClass => $variantClass,
]) }}>
    <x-selli::icon :name="$resolvedIcon" :size="20" class="selli-callout__icon" />
    <div class="selli-callout__body">
        @if ($title)<div class="selli-callout__title">{{ $title }}</div>@endif
        @if (trim($slot) !== '')<div class="selli-callout__text">{{ $slot }}</div>@endif
    </div>
    @if ($dismissible)
        <button type="button" class="selli-callout__dismiss selli-focusable" aria-label="Chiudi" onclick="this.closest('.selli-callout').remove()">
            <x-selli::icon name="x" :size="16" />
        </button>
    @endif
</div>
