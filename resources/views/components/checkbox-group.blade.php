@props([
    'label' => null,
    'horizontal' => false,
])
<div {{ $attributes->class(['selli-field']) }} role="group" @if ($label) aria-label="{{ $label }}" @endif>
    @if ($label)<span class="selli-field__label">{{ $label }}</span>@endif
    <div class="selli-control-group @if ($horizontal) selli-control-group--horizontal @endif">
        {{ $slot }}
    </div>
</div>
