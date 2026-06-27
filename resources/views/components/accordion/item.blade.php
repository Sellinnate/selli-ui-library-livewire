@props([
    'heading' => '',
    'open' => false,
])
<details class="selli-accordion__item" @if ($open) open @endif {{ $attributes }}>
    <summary class="selli-accordion__summary">
        <span>{{ $heading }}</span>
        <span class="selli-accordion__chevron"><x-selli::icon name="chevron-down" :size="18" /></span>
    </summary>
    <div class="selli-accordion__content">{{ $slot }}</div>
</details>
