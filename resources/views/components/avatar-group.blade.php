@props([
    'max' => 4,
    'extra' => 0,
])
<div {{ $attributes->class(['selli-avatar-group']) }}>
    {{ $slot }}
    @if ($extra > 0)
        <span class="selli-avatar-group__more">+{{ $extra }}</span>
    @endif
</div>
