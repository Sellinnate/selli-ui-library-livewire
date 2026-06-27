@props([
    'columns' => null,   // [['key'=>,'label'=>,'numeric'=>bool], ...] or ['key'=>'Label', ...]
    'rows' => null,      // [['key'=>value, ...], ...]
    'hover' => true,
    'striped' => false,
    'empty' => 'Nessun dato disponibile',
])
@php
    // Normalize columns when in data mode.
    $cols = [];
    if (is_array($columns)) {
        foreach ($columns as $key => $col) {
            if (is_array($col)) {
                $cols[] = [
                    'key' => $col['key'] ?? $key,
                    'label' => $col['label'] ?? $col['key'] ?? $key,
                    'numeric' => $col['numeric'] ?? false,
                ];
            } else {
                $cols[] = ['key' => $key, 'label' => $col, 'numeric' => false];
            }
        }
    }
    $dataMode = ! empty($cols) && is_array($rows);
@endphp
<div class="selli-table-wrap selli-scroll">
    <table {{ $attributes->class([
        'selli-table',
        'selli-table--hover' => $hover,
        'selli-table--striped' => $striped,
    ]) }}>
        @if ($dataMode)
            <thead>
                <tr>
                    @foreach ($cols as $col)
                        <th @class(['selli-table__num' => $col['numeric']])>{{ $col['label'] }}</th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                @forelse ($rows as $row)
                    <tr>
                        @foreach ($cols as $col)
                            <td @class(['selli-table__num' => $col['numeric']])>{{ data_get($row, $col['key']) }}</td>
                        @endforeach
                    </tr>
                @empty
                    <tr><td colspan="{{ count($cols) }}" style="text-align:center;color:var(--muted-foreground);padding:2rem;">{{ $empty }}</td></tr>
                @endforelse
            </tbody>
        @else
            {{ $slot }}
        @endif
    </table>
</div>
