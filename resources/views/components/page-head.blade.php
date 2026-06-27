@props([
    'title' => null,
    'sub' => null,
])
<div {{ $attributes->class(['selli-page-head']) }}>
    <div>
        <h2 class="selli-page-head__title">{{ $title }}</h2>
        @if ($sub)<p class="selli-page-head__sub">{{ $sub }}</p>@endif
    </div>
    @isset($actions)<div class="selli-page-head__actions">{{ $actions }}</div>@endisset
</div>
