@props([
    'eyebrow' => null,
    'eyebrowPulse' => true,
    'title' => null,
    'accent' => null,
    'lead' => null,
    'align' => 'left',
])
<div {{ $attributes->class([
    'selli-section-heading',
    'selli-section-heading--center' => $align === 'center',
]) }}>
    @if ($eyebrow)
        <x-selli::eyebrow :pulse="$eyebrowPulse">{{ $eyebrow }}</x-selli::eyebrow>
    @endif
    <h2 class="selli-section-heading__title">
        {{ $title }}@if ($accent) <span class="selli-section-heading__accent">{{ $accent }}</span>@endif
    </h2>
    @if ($lead)<p class="selli-section-heading__lead">{{ $lead }}</p>@endif
    {{ $slot }}
</div>
