@props([
    'width' => '100%',
    'height' => '16px',
    'circle' => false,
])
@php
    $w = is_numeric($width) ? $width.'px' : $width;
    $h = is_numeric($height) ? $height.'px' : $height;
@endphp
<span
    {{ $attributes->class(['selli-skeleton', 'selli-skeleton--circle' => $circle])
        ->merge(['style' => "width:{$w};height:{$h};"]) }}
    aria-hidden="true"
></span>
