@props([
    'data' => [],
    'width' => 120,
    'height' => 32,
    'area' => true,
])
@php
    $values = array_values(array_map('floatval', $data));
    $n = count($values);
    $w = (float) $width;
    $h = (float) $height;
    $pad = 2.0;
    $points = '';
    if ($n > 1) {
        $min = min($values);
        $max = max($values);
        $span = ($max - $min) ?: 1;
        $stepX = ($w - 2 * $pad) / ($n - 1);
        $coords = [];
        foreach ($values as $i => $v) {
            $x = $pad + $i * $stepX;
            $y = $h - $pad - (($v - $min) / $span) * ($h - 2 * $pad);
            $coords[] = round($x, 2).','.round($y, 2);
        }
        $points = implode(' ', $coords);
        $first = explode(',', $coords[0]);
        $last = explode(',', $coords[$n - 1]);
        $areaPath = "M{$first[0]},".($h - $pad)." L".str_replace(' ', ' L', $points)." L{$last[0]},".($h - $pad)." Z";
    }
@endphp
<svg {{ $attributes->class(['selli-sparkline']) }} width="{{ $width }}" height="{{ $height }}" viewBox="0 0 {{ $width }} {{ $height }}" role="img" aria-label="Andamento">
    @if ($n > 1)
        @if ($area)<path class="selli-sparkline__area" d="{{ $areaPath }}" />@endif
        <polyline class="selli-sparkline__line" points="{{ $points }}" />
    @endif
</svg>
