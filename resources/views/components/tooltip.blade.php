@props([
    'label' => '',
    'placement' => 'top',
])
@php $tipId = 'selli-tip-'.uniqid(); @endphp
<span {{ $attributes->class(['selli-tooltip']) }} @if ($label !== '') aria-describedby="{{ $tipId }}" @endif>
    {{ $slot }}
    @if ($label !== '')
        <span role="tooltip" id="{{ $tipId }}" class="selli-tooltip__bubble selli-tooltip__bubble--{{ $placement }}">{{ $label }}</span>
    @endif
</span>
