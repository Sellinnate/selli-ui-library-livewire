@props([
    'current' => 1,
    'total' => 1,
    'around' => 1,
    'url' => null, // pattern containing ":page", e.g. "?page=:page"; null => buttons
])
@php
    $current = max(1, (int) $current);
    $total = max(1, (int) $total);
    $around = max(0, (int) $around);

    // Build the page window with ellipses.
    $pages = [];
    $add = function ($p) use (&$pages) {
        if (! in_array($p, $pages, true)) {
            $pages[] = $p;
        }
    };
    $add(1);
    for ($p = $current - $around; $p <= $current + $around; $p++) {
        if ($p > 1 && $p < $total) {
            $add($p);
        }
    }
    if ($total > 1) {
        $add($total);
    }
    sort($pages);

    $href = fn ($p) => $url ? str_replace(':page', (string) $p, $url) : null;
@endphp
<nav {{ $attributes->class(['selli-pagination']) }} aria-label="Paginazione">
    @php $prev = $current - 1; @endphp
    @if ($url && $current > 1)
        <a href="{{ $href($prev) }}" class="selli-pagination__btn" aria-label="Precedente"><x-selli::icon name="chevron-left" :size="16" /></a>
    @else
        <button type="button" class="selli-pagination__btn" aria-label="Precedente" @if ($current <= 1) aria-disabled="true" @endif @if ($url) onclick="window.location='{{ $href($prev) }}'" @endif>
            <x-selli::icon name="chevron-left" :size="16" />
        </button>
    @endif

    @php $printed = 0; @endphp
    @foreach ($pages as $p)
        @if ($printed && $p - $printed > 1)
            <span class="selli-pagination__ellipsis">…</span>
        @endif
        @if ($url)
            <a href="{{ $href($p) }}" class="selli-pagination__btn @if ($p === $current) selli-pagination__btn--active @endif" @if ($p === $current) aria-current="page" @endif>{{ $p }}</a>
        @else
            <button type="button" class="selli-pagination__btn @if ($p === $current) selli-pagination__btn--active @endif" @if ($p === $current) aria-current="page" @endif data-page="{{ $p }}">{{ $p }}</button>
        @endif
        @php $printed = $p; @endphp
    @endforeach

    @php $next = $current + 1; @endphp
    @if ($url && $current < $total)
        <a href="{{ $href($next) }}" class="selli-pagination__btn" aria-label="Successiva"><x-selli::icon name="chevron-right" :size="16" /></a>
    @else
        <button type="button" class="selli-pagination__btn" aria-label="Successiva" @if ($current >= $total) aria-disabled="true" @endif @if ($url) onclick="window.location='{{ $href($next) }}'" @endif>
            <x-selli::icon name="chevron-right" :size="16" />
        </button>
    @endif
</nav>
