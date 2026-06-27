@props(['pulse' => true])
<span {{ $attributes->class(['selli-eyebrow']) }}>
    @if ($pulse)<span class="selli-eyebrow__dot" aria-hidden="true"></span>@endif
    {{ $slot }}
</span>
