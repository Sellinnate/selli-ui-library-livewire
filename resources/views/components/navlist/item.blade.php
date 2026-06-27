@props([
    'icon' => null,
    'href' => null,
    'active' => false,
])
@php $tag = $href ? 'a' : 'button'; @endphp
<{{ $tag }}
    @if ($tag === 'a') href="{{ $href }}" @else type="button" @endif
    @if ($active) aria-current="page" @endif
    {{ $attributes->class([
        'selli-navlist__item',
        'selli-navlist__item--active' => $active,
    ]) }}
>
    @if ($icon)<x-selli::icon :name="$icon" :size="18" />@endif
    <span>{{ $slot }}</span>
    @isset($badge)<span class="selli-navlist__badge">{{ $badge }}</span>@endisset
</{{ $tag }}>
