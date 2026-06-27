@props([
    'label' => null,
    'description' => null,
])
<label class="selli-check">
    <input type="checkbox" {{ $attributes->class(['selli-check__box']) }}>
    @if ($label || $description || trim($slot) !== '')
        <span class="selli-check__text">
            <span>{{ $label ?? $slot }}</span>
            @if ($description)<span class="selli-check__desc">{{ $description }}</span>@endif
        </span>
    @endif
</label>
