@props([
    'size' => 'md',
    'showText' => true,
    'text' => 'Selli',
])
<span {{ $attributes->class(['selli-brand', 'selli-brand--'.$size]) }}>
    <span class="selli-brand__mark" aria-hidden="true"><i></i><i></i></span>
    @if ($showText)<span class="selli-brand__text">{{ $text }}</span>@endif
</span>
