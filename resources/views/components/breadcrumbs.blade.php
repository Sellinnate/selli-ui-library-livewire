@props([
    'items' => [],
])
@php
    // Normalize each item to ['label' => ..., 'url' => ...|null].
    $normalized = [];
    foreach ($items as $key => $item) {
        if (is_array($item)) {
            $normalized[] = ['label' => $item['label'] ?? '', 'url' => $item['url'] ?? null];
        } else {
            $normalized[] = ['label' => $item, 'url' => is_string($key) ? $key : null];
        }
    }
    $last = count($normalized) - 1;
@endphp
<nav {{ $attributes->class(['selli-breadcrumbs']) }} aria-label="Breadcrumb">
    @if (count($normalized))
        @foreach ($normalized as $i => $crumb)
            @if ($i === $last || ! $crumb['url'])
                <span class="selli-breadcrumbs__item selli-breadcrumbs__item--current" @if ($i === $last) aria-current="page" @endif>{{ $crumb['label'] }}</span>
            @else
                <a href="{{ $crumb['url'] }}" class="selli-breadcrumbs__item">{{ $crumb['label'] }}</a>
            @endif
            @if ($i !== $last)<span class="selli-breadcrumbs__sep"><x-selli::icon name="chevron-right" :size="14" /></span>@endif
        @endforeach
    @else
        {{ $slot }}
    @endif
</nav>
