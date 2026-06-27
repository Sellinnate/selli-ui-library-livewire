@props([
    'as' => 'p',
    'size' => 'base',
    'color' => 'muted',
    'weight' => null,
])
@php
    $styles = 'font-size:var(--text-'.$size.');';
    if ($weight) {
        $styles .= 'font-weight:'.$weight.';';
    }
@endphp
<{{ $as }} {{ $attributes->class([
    'selli-text',
    'selli-text--'.$color,
])->merge(['style' => $styles]) }}>{{ $slot }}</{{ $as }}>
