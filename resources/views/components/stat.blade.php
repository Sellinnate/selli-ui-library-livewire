@props([
    'value' => null,
    'label' => null,
])
<div {{ $attributes->class(['selli-stat']) }}>
    <div class="selli-stat__value">{{ $value }}</div>
    @if ($label)<h3 class="selli-stat__label">{{ $label }}</h3>@endif
    @if (trim($slot) !== '')<p class="selli-stat__body">{{ $slot }}</p>@endif
</div>
