@props([])
{{-- Drop once near the end of your layout. Trigger toasts from anywhere with
     window.selliToast({ title, message, variant, timeout }) or by dispatching
     a `selli-toast` CustomEvent. --}}
<div
    {{ $attributes->class(['selli-toast-host']) }}
    x-data="selliToastHost()"
    x-on:selli-toast.window="push($event.detail)"
    aria-live="polite"
    aria-atomic="false"
>
    <template x-for="t in toasts" :key="t.id">
        <div class="selli-toast" :class="`selli-toast--${t.variant}`" role="status">
            <span class="selli-toast__icon" x-html="icon(t.variant)"></span>
            <div class="selli-toast__body">
                <template x-if="t.title"><div class="selli-toast__title" x-text="t.title"></div></template>
                <template x-if="t.message"><div class="selli-toast__msg" x-text="t.message"></div></template>
            </div>
            <button type="button" class="selli-toast__close" aria-label="Chiudi" @click="dismiss(t.id)">&times;</button>
        </div>
    </template>
</div>
