@props([
    'name' => null,
    'title' => null,
    'size' => 'md',
])
<div
    x-data="{ open: false }"
    @if ($name)
        x-on:selli-open-modal.window="$event.detail === @js($name) && (open = true)"
        x-on:selli-close-modal.window="(! $event.detail || $event.detail === @js($name)) && (open = false)"
    @endif
    {{ $attributes }}
>
    @isset($trigger)
        <div @click="open = true">{{ $trigger }}</div>
    @endisset

    <template x-teleport="body">
        <div class="selli-modal__backdrop" x-show="open" x-cloak @keydown.escape.window="open = false" @click.self="open = false" x-transition.opacity>
            <div class="selli-modal__panel selli-modal__panel--{{ $size }}" role="dialog" aria-modal="true" x-transition.scale.origin.center>
                <div class="selli-modal__header">
                    @if ($title)<h2 class="selli-modal__title">{{ $title }}</h2>@else<span></span>@endif
                    <button type="button" class="selli-modal__close" aria-label="Chiudi" @click="open = false"><x-selli::icon name="x" :size="18" /></button>
                </div>
                <div class="selli-modal__body">{{ $slot }}</div>
                @isset($footer)<div class="selli-modal__footer">{{ $footer }}</div>@endisset
            </div>
        </div>
    </template>
</div>
