@props([
    'title' => null,
    'sub' => null,
    'brand' => true,
])
<div {{ $attributes->class(['selli-auth-card']) }}>
    <div class="selli-auth-card__head">
        @isset($logo)
            {{ $logo }}
        @elseif ($brand)
            <x-selli::brand size="lg" />
        @endif
        @if ($title)<h1 class="selli-auth-card__title">{{ $title }}</h1>@endif
        @if ($sub)<p class="selli-auth-card__sub">{{ $sub }}</p>@endif
    </div>
    <div class="selli-auth-card__body">{{ $slot }}</div>
    @isset($footer)<div class="selli-auth-card__footer">{{ $footer }}</div>@endisset
</div>
