@props([
    'color' => 'var(--primary)',
    'pulse' => false,
    'size' => 8,
])
@php
    $s = is_numeric($size) ? $size.'px' : $size;
@endphp
<span {{ $attributes->class(['selli-dot'])->merge(['style' => "width:{$s};height:{$s};"]) }} aria-hidden="true">
    @if ($pulse)<span class="selli-dot__ping" style="background:{{ $color }};"></span>@endif
    <span class="selli-dot__core" style="background:{{ $color }};"></span>
</span>
