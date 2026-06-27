@props([
    'name' => null,
    'title' => null,
    'size' => 'md',
])
@php $titleId = 'selli-modal-title-'.uniqid(); @endphp
<div
    x-data="selliModal()"
    @if ($name)
        x-on:selli-open-modal.window="$event.detail === @js($name) && (open = true, onOpen())"
        x-on:selli-close-modal.window="(! $event.detail || $event.detail === @js($name)) && onClose()"
    @endif
    {{ $attributes }}
>
    @isset($trigger)
        <div @click="open = true; onOpen()">{{ $trigger }}</div>
    @endisset

    <template x-teleport="body">
        <div
            class="selli-modal__backdrop"
            x-show="open"
            x-cloak
            @keydown.escape.window="onClose()"
            @keydown.tab="trap($event)"
            @click.self="onClose()"
            x-transition.opacity
        >
            <div
                class="selli-modal__panel selli-modal__panel--{{ $size }}"
                role="dialog"
                aria-modal="true"
                @if ($title) aria-labelledby="{{ $titleId }}" @else aria-label="Finestra di dialogo" @endif
                tabindex="-1"
                x-ref="panel"
                x-transition.scale.origin.center
            >
                <div class="selli-modal__header">
                    @if ($title)<h2 class="selli-modal__title" id="{{ $titleId }}">{{ $title }}</h2>@else<span></span>@endif
                    <button type="button" class="selli-modal__close selli-focusable" aria-label="Chiudi" @click="onClose()"><x-selli::icon name="x" :size="18" /></button>
                </div>
                <div class="selli-modal__body">{{ $slot }}</div>
                @isset($footer)<div class="selli-modal__footer">{{ $footer }}</div>@endisset
            </div>
        </div>
    </template>
</div>
