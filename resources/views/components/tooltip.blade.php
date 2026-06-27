@props([
    'label' => '',
    'placement' => 'top',
])
<span {{ $attributes->class(['selli-tooltip']) }}>
    {{ $slot }}
    @if ($label !== '')
        <span role="tooltip" class="selli-tooltip__bubble selli-tooltip__bubble--{{ $placement }}">{{ $label }}</span>
    @endif
</span>
