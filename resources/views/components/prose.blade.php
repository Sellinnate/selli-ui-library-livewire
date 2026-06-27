@props([
    'title' => null,
    'meta' => null,
])
{{-- A readable text column for legal / policy / documentation content. It styles
     plain HTML headings, paragraphs, lists and links — just drop markup inside. --}}
<article {{ $attributes->class(['selli-prose']) }}>
    @if ($title)<h1>{{ $title }}</h1>@endif
    @if ($meta)<p class="selli-prose__meta">{{ $meta }}</p>@endif
    {{ $slot }}
</article>
