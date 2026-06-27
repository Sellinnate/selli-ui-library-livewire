@props([
    'split' => false,
])
{{-- Full-screen, centered layout for guest/auth screens. Drops a soft brand
     glow behind the content. With :split="true" it shows a branded left panel
     (brand / aside / asideFooter slots) beside the centered content. --}}
@if ($split)
    <div {{ $attributes->class(['selli-guest__split']) }}>
        <aside class="selli-guest__aside">
            <div>{{ $brand ?? '' }}</div>
            <div class="selli-guest__aside-body">{{ $aside ?? '' }}</div>
            <div>{{ $asideFooter ?? '' }}</div>
        </aside>
        <div class="selli-guest__panel">{{ $slot }}</div>
    </div>
@else
    <div {{ $attributes->class(['selli-guest']) }}>
        {{ $slot }}
    </div>
@endif
