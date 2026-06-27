@props([
    'code' => '404',
    'title' => 'Pagina non trovata',
    'desc' => null,
])
<div {{ $attributes->class(['selli-error']) }}>
    <div class="selli-error__code" aria-hidden="true">{{ $code }}</div>
    <h1 class="selli-error__title">{{ $title }}</h1>
    @if ($desc)<p class="selli-error__desc">{{ $desc }}</p>@endif
    @isset($actions)<div class="selli-error__actions">{{ $actions }}</div>@endisset
    {{ $slot }}
</div>
