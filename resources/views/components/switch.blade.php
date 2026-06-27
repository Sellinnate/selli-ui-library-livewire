@props([
    'label' => null,
])
<label class="selli-switch">
    <input type="checkbox" {{ $attributes->class(['selli-switch__input']) }}>
    <span class="selli-switch__track"><span class="selli-switch__thumb"></span></span>
    @if ($label || trim($slot) !== '')<span>{{ $label ?? $slot }}</span>@endif
</label>
