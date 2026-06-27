@props([
    'value' => null,
    'size' => 'md',
    'color' => 'var(--primary)',
    'label' => null,
])
@php
    $indeterminate = $value === null;
    $pct = $indeterminate ? null : max(0, min(100, (float) $value));
@endphp
<div {{ $attributes->class(['selli-progress', 'selli-progress--'.$size]) }}>
    @if ($label)
        <div class="selli-progress__head">
            <span>{{ $label }}</span>
            @unless ($indeterminate)<span class="selli-progress__value">{{ round($pct) }}%</span>@endunless
        </div>
    @endif
    <div
        class="selli-progress__track"
        role="progressbar"
        @if ($label) aria-label="{{ $label }}" @endif
        @unless ($indeterminate)
            aria-valuenow="{{ round($pct) }}" aria-valuemin="0" aria-valuemax="100"
        @endunless
    >
        @if ($indeterminate)
            <div class="selli-progress__bar selli-progress__bar--indeterminate" style="background:{{ $color }};"></div>
        @else
            <div class="selli-progress__bar" style="width:{{ $pct }}%;background:{{ $color }};"></div>
        @endif
    </div>
</div>
