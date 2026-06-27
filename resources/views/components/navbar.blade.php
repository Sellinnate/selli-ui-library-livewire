@props([])
<header {{ $attributes->class(['selli-navbar']) }}>
    <div class="selli-navbar__section">{{ $start ?? '' }}</div>
    @isset($center)<div class="selli-navbar__section selli-navbar__section--grow">{{ $center }}</div>@endisset
    <div class="selli-navbar__section">{{ $end ?? $slot }}</div>
</header>
