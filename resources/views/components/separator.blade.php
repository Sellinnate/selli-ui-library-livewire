@props([
    'vertical' => false,
    'label' => null,
])
@if ($label && ! $vertical)
    <div role="separator" {{ $attributes->class(['selli-separator', 'selli-separator--labeled']) }}>
        <span class="selli-separator__line"></span>
        <span class="selli-separator__label">{{ $label }}</span>
        <span class="selli-separator__line"></span>
    </div>
@else
    <div
        role="separator"
        @if ($vertical) aria-orientation="vertical" @endif
        {{ $attributes->class([
            'selli-separator',
            'selli-separator--vertical' => $vertical,
        ]) }}
    ></div>
@endif
