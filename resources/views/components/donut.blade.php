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
    <text class="selli-donut__center-value" x="{{ $cx }}" y="{{ $label ? $cx - 6 : $cx }}" style="font-size:{{ round($size * 0.2) }}px;">{{ round($pct) }}%</text>
    @if ($label)
        <text class="selli-donut__center-label" x="{{ $cx }}" y="{{ $cx + 12 }}" style="font-size:{{ round($size * 0.1) }}px;">{{ $label }}</text>
    @endif
</svg>
