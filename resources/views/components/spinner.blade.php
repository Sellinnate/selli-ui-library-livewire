@props([
    'size' => 20,
    'color' => 'var(--primary)',
    'label' => 'Caricamento…',
])
<span {{ $attributes->class(['selli-spinner']) }} role="status" aria-label="{{ $label }}">
    <svg width="{{ $size }}" height="{{ $size }}" viewBox="0 0 24 24" fill="none" stroke="{{ $color }}" stroke-width="2.5" stroke-linecap="round">
        <path d="M21 12a9 9 0 1 1-6.219-8.56" />
    </svg>
</span>
