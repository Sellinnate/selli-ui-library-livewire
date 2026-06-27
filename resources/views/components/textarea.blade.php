@props([
    'rows' => 4,
    'invalid' => false,
])
<textarea
    rows="{{ $rows }}"
    {{ $attributes->class([
        'selli-textarea',
        'selli-textarea--invalid' => $invalid,
    ]) }}
    @if ($invalid) aria-invalid="true" @endif
>{{ $slot }}</textarea>
