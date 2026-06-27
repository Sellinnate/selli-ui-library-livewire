@props([
    'month' => null,        // 1-12 (defaults to current)
    'year' => null,
    'selected' => null,     // 'Y-m-d'
    'events' => [],         // ['Y-m-d', ...]
    'prevUrl' => null,
    'nextUrl' => null,
])
@php
    $today = new \DateTimeImmutable('today');
    $month = (int) ($month ?? $today->format('n'));
    $year = (int) ($year ?? $today->format('Y'));
    $first = (new \DateTimeImmutable())->setDate($year, $month, 1)->setTime(0, 0);
    $daysInMonth = (int) $first->format('t');
    // Monday-first leading offset (ISO: 1=Mon .. 7=Sun).
    $lead = ((int) $first->format('N')) - 1;
    $todayStr = $today->format('Y-m-d');
    $eventsSet = array_flip($events);

    $months = ['', 'Gennaio', 'Febbraio', 'Marzo', 'Aprile', 'Maggio', 'Giugno', 'Luglio', 'Agosto', 'Settembre', 'Ottobre', 'Novembre', 'Dicembre'];
    $dow = ['Lun', 'Mar', 'Mer', 'Gio', 'Ven', 'Sab', 'Dom'];
@endphp
<div {{ $attributes->class(['selli-calendar']) }}>
    <div class="selli-calendar__header">
        <span class="selli-calendar__title">{{ $months[$month] }} {{ $year }}</span>
        <div class="selli-calendar__nav">
            <a class="selli-calendar__nav-btn" @if ($prevUrl) href="{{ $prevUrl }}" @endif aria-label="Mese precedente"><x-selli::icon name="chevron-left" :size="16" /></a>
            <a class="selli-calendar__nav-btn" @if ($nextUrl) href="{{ $nextUrl }}" @endif aria-label="Mese successivo"><x-selli::icon name="chevron-right" :size="16" /></a>
        </div>
    </div>
    <div class="selli-calendar__grid" role="grid">
        @foreach ($dow as $d)
            <div class="selli-calendar__dow">{{ $d }}</div>
        @endforeach
        @for ($i = 0; $i < $lead; $i++)
            <span class="selli-calendar__day selli-calendar__day--muted"></span>
        @endfor
        @for ($day = 1; $day <= $daysInMonth; $day++)
            @php
                $dateStr = sprintf('%04d-%02d-%02d', $year, $month, $day);
                $isToday = $dateStr === $todayStr;
                $isSelected = $selected === $dateStr;
                $hasEvent = isset($eventsSet[$dateStr]);
            @endphp
            <button
                type="button"
                data-date="{{ $dateStr }}"
                @class([
                    'selli-calendar__day',
                    'selli-calendar__day--today' => $isToday,
                    'selli-calendar__day--selected' => $isSelected,
                    'selli-calendar__day--event' => $hasEvent,
                ])
                @if ($isSelected) aria-current="date" @endif
            >{{ $day }}</button>
        @endfor
    </div>
</div>
