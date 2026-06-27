@props([])
{{-- A vertical layout: a top navbar, a centered content column, and an optional
     footer. The complement to <x-selli::app-shell> (which has a sidebar). --}}
<div {{ $attributes->class(['selli-stacked']) }}>
    {{ $navbar ?? '' }}
    <main class="selli-stacked__main">
        <div class="selli-stacked__content">
            {{ $slot }}
        </div>
    </main>
    @isset($footer)
        <footer class="selli-stacked__footer">
            <div class="selli-stacked__footer-inner">{{ $footer }}</div>
        </footer>
    @endisset
</div>
