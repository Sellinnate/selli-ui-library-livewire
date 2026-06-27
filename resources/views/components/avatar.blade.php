@props([
    'src' => null,
    'name' => '',
    'size' => 'md',
    'status' => null,
    'square' => false,
    'ring' => false,
])
@php
    $words = preg_split('/\s+/', trim($name), -1, PREG_SPLIT_NO_EMPTY) ?: [];
    $initials = '';
    foreach (array_slice($words, 0, 2) as $w) {
        $initials .= mb_substr($w, 0, 1);
    }
    $initials = $initials !== '' ? mb_strtoupper($initials) : '?';
@endphp
<span {{ $attributes->class([
    'selli-avatar',
    'selli-avatar--'.$size,
    'selli-avatar--square' => $square,
    'selli-avatar--ring' => $ring,
]) }}>
    <span class="selli-avatar__img">
        @if ($src)
            <img src="{{ $src }}" alt="{{ $name }}">
        @else
            {{ $initials }}
        @endif
    </span>
    @if ($status)
        <span class="selli-avatar__status selli-avatar__status--{{ $status }}"></span>
    @endif
</span>
