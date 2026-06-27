@props([
    'label' => null,
])
<label class="selli-switch" x-data="{ on: false }" x-init="on = $refs.cb.checked">
    <input
        type="checkbox"
        role="switch"
        x-ref="cb"
        @change="on = $refs.cb.checked"
        :aria-checked="on ? 'true' : 'false'"
        {{ $attributes->class(['selli-switch__input']) }}
    >
    <span class="selli-switch__track" aria-hidden="true"><span class="selli-switch__thumb"></span></span>
    @if ($label || trim($slot) !== '')<span>{{ $label ?? $slot }}</span>@endif
</label>
