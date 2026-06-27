@props([
    'icon' => 'activity',
    'label' => null,
    'value' => null,
    'delta' => null,
    'deltaDir' => 'up',
    'spark' => null,         // array of numbers for an optional sparkline
    'accent' => 'var(--primary)',
])
@php $up = $deltaDir !== 'down'; @endphp
<div {{ $attributes->class(['selli-stat-card']) }}>
    <div class="selli-stat-card__top">
        <span class="selli-stat-card__icon" style="background:color-mix(in oklab, {{ $accent }} 14%, var(--card));color:{{ $accent }};">
            <x-selli::icon :name="$icon" :size="19" :color="$accent" />
        </span>
        @if ($delta !== null)
            <span @class(['selli-stat-card__delta', 'selli-stat-card__delta--up' => $up, 'selli-stat-card__delta--down' => ! $up])>
                <x-selli::icon :name="$up ? 'trending-up' : 'trending-down'" :size="14" />{{ $delta }}
            </span>
        @endif
    </div>
    <div>
        <div class="selli-stat-card__value">{{ $value }}</div>
        @if ($label)<div class="selli-stat-card__label">{{ $label }}</div>@endif
    </div>
    @if ($spark)
        <x-selli::sparkline :data="$spark" :width="999" :height="36" :color="$accent" style="width:100%;" />
    @endif
</div>
