@props([])
{{-- Toggles the `.light` class on <html> and persists the choice to
     localStorage under "selli-theme". Dark is the default. --}}
<button
    type="button"
    {{ $attributes->class(['selli-theme-toggle', 'selli-focusable']) }}
    aria-label="Cambia tema"
    x-data="{
        light: document.documentElement.classList.contains('light'),
        toggle() {
            this.light = ! this.light;
            document.documentElement.classList.toggle('light', this.light);
            try { localStorage.setItem('selli-theme', this.light ? 'light' : 'dark'); } catch (e) {}
        }
    }"
    @click="toggle()"
>
    <span x-show="!light"><x-selli::icon name="moon" :size="18" /></span>
    <span x-show="light" x-cloak><x-selli::icon name="sun" :size="18" /></span>
</button>
