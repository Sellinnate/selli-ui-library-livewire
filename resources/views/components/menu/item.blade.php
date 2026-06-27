@props([
    'icon' => null,
    'href' => null,
    'shortcut' => null,
    'danger' => false,
    'disabled' => false,
])
@php $tag = $href ? 'a' : 'button'; @endphp
<{{ $tag }}
    role="menuitem"
    @if ($tag === 'a') href="{{ $disabled ? null : $href }}" @else type="button" @endif
    @if ($disabled) aria-disabled="true" @endif
    {{ $attributes->class([
        'selli-menu__item',
        'selli-menu__item--danger' => $danger,
    ]) }}
>
    @if ($icon)<x-selli::icon :name="$icon" :size="16" />@endif
    <span>{{ $slot }}</span>
    @if ($shortcut)<span class="selli-menu__shortcut">{{ $shortcut }}</span>@endif
</{{ $tag }}>
