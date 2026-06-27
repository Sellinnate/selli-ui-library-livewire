@props([
    'value' => 0,      // percentage 0-100 (single-value mode)
    'size' => 120,
    'thickness' => 12,
    'label' => null,
    'color' => 'var(--primary)',
])
@php
    $size = (float) $size;
    $thickness = (float) $thickness;
    $pct = max(0, min(100, (float) $value));
    $r = ($size - $thickness) / 2;
    $cx = $size / 2;
    $circ = 2 * M_PI * $r;
    $dash = round($circ * $pct / 100, 2);
    $gap = round($circ - $dash, 2);

    // Centre text geometry. Both texts use a central baseline; when a label is
    // present the value shifts up and the label sits clearly below it.
    $valueSize = round($size * ($label ? 0.18 : 0.22));
    $labelSize = round($size * 0.085);
    $valueY = $label ? round($cx - $size * 0.075) : $cx;
    $labelY = round($cx + $size * 0.15);
@endphp
<svg {{ $attributes->class(['selli-donut']) }} width="{{ $size }}" height="{{ $size }}" viewBox="0 0 {{ $size }} {{ $size }}" role="img" aria-label="{{ $label ?? ($pct.'%') }}">
    <circle class="selli-donut__track" cx="{{ $cx }}" cy="{{ $cx }}" r="{{ $r }}" stroke-width="{{ $thickness }}" />
    <circle
        cx="{{ $cx }}" cy="{{ $cx }}" r="{{ $r }}"
        fill="none" stroke="{{ $color }}" stroke-width="{{ $thickness }}" stroke-linecap="round"
        stroke-dasharray="{{ $dash }} {{ $gap }}"
        transform="rotate(-90 {{ $cx }} {{ $cx }})"
        style="transition:stroke-dasharray var(--dur-slow) var(--ease-out);"
    />
    <text class="selli-donut__center-value" x="{{ $cx }}" y="{{ $valueY }}" style="font-size:{{ $valueSize }}px;">{{ round($pct) }}%</text>
    @if ($label)
        <text class="selli-donut__center-label" x="{{ $cx }}" y="{{ $labelY }}" style="font-size:{{ $labelSize }}px;dominant-baseline:central;">{{ $label }}</text>
    @endif
</svg>
