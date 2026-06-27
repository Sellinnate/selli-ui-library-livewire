@props([
    'type' => 'bar',         // bar | line
    'data' => [],            // [['label'=>, 'value'=>], ...] or ['label'=>value, ...]
    'height' => 220,
    'color' => 'var(--primary)',
])
@php
    // Normalize.
    $items = [];
    foreach ($data as $k => $v) {
        if (is_array($v)) {
            $items[] = ['label' => $v['label'] ?? $k, 'value' => (float) ($v['value'] ?? 0)];
        } else {
            $items[] = ['label' => $k, 'value' => (float) $v];
        }
    }
    $n = count($items);
    $w = 600.0;
    $h = (float) $height;
    $padB = 28.0; // bottom axis room
    $padT = 10.0;
    $plotH = $h - $padB - $padT;
    $max = $n ? max(array_map(fn ($i) => $i['value'], $items)) : 0;
    $max = $max ?: 1;

    $linePoints = '';
    if ($type === 'line' && $n > 1) {
        $stepX = $w / ($n - 1);
        $coords = [];
        foreach ($items as $i => $it) {
            $x = $i * $stepX;
            $y = $padT + $plotH - ($it['value'] / $max) * $plotH;
            $coords[] = round($x, 2).','.round($y, 2);
        }
        $linePoints = implode(' ', $coords);
        $areaPath = 'M0,'.($padT + $plotH).' L'.str_replace(' ', ' L', $linePoints).' L'.$w.','.($padT + $plotH).' Z';
    }
@endphp
<svg {{ $attributes->class(['selli-chart']) }} viewBox="0 0 {{ $w }} {{ $h }}" preserveAspectRatio="none" role="img" aria-label="Grafico">
    {{-- baseline --}}
    <line class="selli-chart__grid" x1="0" y1="{{ $padT + $plotH }}" x2="{{ $w }}" y2="{{ $padT + $plotH }}" />

    @if ($type === 'bar')
        @php $bw = $n ? ($w / $n) * 0.6 : 0; $gap = $n ? ($w / $n) : 0; @endphp
        @foreach ($items as $i => $it)
            @php
                $bh = ($it['value'] / $max) * $plotH;
                $x = $i * $gap + ($gap - $bw) / 2;
                $y = $padT + $plotH - $bh;
            @endphp
            <rect class="selli-chart__bar" x="{{ round($x, 2) }}" y="{{ round($y, 2) }}" width="{{ round($bw, 2) }}" height="{{ round($bh, 2) }}" rx="3" fill="{{ $color }}">
                <title>{{ $it['label'] }}: {{ $it['value'] }}</title>
            </rect>
            <text class="selli-chart__label" x="{{ round($i * $gap + $gap / 2, 2) }}" y="{{ $h - 8 }}" text-anchor="middle">{{ $it['label'] }}</text>
        @endforeach
    @elseif ($type === 'line' && $n > 1)
        <path class="selli-chart__area" d="{{ $areaPath }}" fill="{{ $color }}" />
        <polyline class="selli-chart__line" points="{{ $linePoints }}" stroke="{{ $color }}" />
        @php $stepX = $w / ($n - 1); @endphp
        @foreach ($items as $i => $it)
            <circle class="selli-chart__dot" cx="{{ round($i * $stepX, 2) }}" cy="{{ round($padT + $plotH - ($it['value'] / $max) * $plotH, 2) }}" r="3" fill="{{ $color }}">
                <title>{{ $it['label'] }}: {{ $it['value'] }}</title>
            </circle>
        @endforeach
    @endif
</svg>
