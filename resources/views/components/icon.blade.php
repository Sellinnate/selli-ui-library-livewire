@props([
    'name',
    'size' => 20,
    'strokeWidth' => 2,
    'color' => 'currentColor',
    'title' => null,
])
@php
    $inner = \Selli\Ui\Icons::path($name);
@endphp
<svg
    xmlns="http://www.w3.org/2000/svg"
    width="{{ $size }}"
    height="{{ $size }}"
    viewBox="0 0 24 24"
    fill="none"
    stroke="{{ $color }}"
    stroke-width="{{ $strokeWidth }}"
    stroke-linecap="round"
    stroke-linejoin="round"
    @if ($title)
        role="img" aria-label="{{ $title }}"
    @else
        aria-hidden="true"
    @endif
    {{ $attributes->merge(['style' => 'display:block;flex-shrink:0;']) }}
>@if ($title)<title>{{ $title }}</title>@endif{!! $inner !!}</svg>
