@props([
    'index' => 0,
])
{{-- ids mirror the tab ids generated in <x-selli::tabs>. The component uses
     uniqid per tabs instance; panels share the same parent x-data scope, and
     wire ids via the data-index on tabs. We re-derive a stable pair using the
     index and the nearest tablist. --}}
<div
    class="selli-tabs__panel"
    role="tabpanel"
    tabindex="0"
    x-show="active === {{ (int) $index }}"
    x-cloak
    {{ $attributes }}
>
    {{ $slot }}
</div>
