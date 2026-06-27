@props([
    'options' => [],
    'placeholder' => null,
    'invalid' => false,
    'selected' => null,
    'describedby' => null,
])
<div class="selli-select-wrap">
    <select
        {{ $attributes->class([
            'selli-select',
            'selli-select--invalid' => $invalid,
        ]) }}
        @if ($invalid) aria-invalid="true" @endif
        @if ($describedby) aria-describedby="{{ $describedby }}" @endif
    >
        @if ($placeholder)<option value="" disabled @selected($selected === null || $selected === '')>{{ $placeholder }}</option>@endif
        @forelse ($options as $value => $label)
            <option value="{{ $value }}" @selected((string) $selected === (string) $value)>{{ $label }}</option>
        @empty
            {{ $slot }}
        @endforelse
    </select>
    <span class="selli-select-wrap__chevron" aria-hidden="true"><x-selli::icon name="chevron-down" :size="18" /></span>
</div>
