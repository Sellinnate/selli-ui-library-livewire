@props([
    'level' => 2,
    'gradient' => false,
])
@php
    $level = max(1, min(6, (int) $level));
    $tag = 'h'.$level;
@endphp
<{{ $tag }} {{ $attributes->class([
    'selli-heading',
    'selli-heading--'.$level,
    'selli-heading--gradient' => $gradient,
]) }}>{{ $slot }}</{{ $tag }}>
