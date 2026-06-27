@props([
    'label' => null,
    'description' => null,
    'error' => null,
    'hint' => null,
    'required' => false,
    'for' => null,
])
<div {{ $attributes->class(['selli-field']) }}>
    @if ($label)
        <label @if ($for) for="{{ $for }}" @endif class="selli-field__label">
            {{ $label }}@if ($required)<span class="selli-field__req">*</span>@endif
        </label>
    @endif
    @if ($description)<p class="selli-field__desc">{{ $description }}</p>@endif
    {{ $slot }}
    @if ($error)
        <p class="selli-field__error"><x-selli::icon name="alert-circle" :size="13" />{{ $error }}</p>
    @elseif ($hint)
        <p class="selli-field__hint">{{ $hint }}</p>
    @endif
</div>
