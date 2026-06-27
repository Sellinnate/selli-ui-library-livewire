@props([
    'rows' => 4,
    'invalid' => false,
    'describedby' => null,
])
<textarea
    rows="{{ $rows }}"
    {{ $attributes->class([
        'selli-textarea',
        'selli-textarea--invalid' => $invalid,
    ]) }}
    @if ($invalid) aria-invalid="true" @endif
    @if ($describedby) aria-describedby="{{ $describedby }}" @endif
>{{ $slot }}</textarea>
