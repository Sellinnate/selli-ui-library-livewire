@props([
    'index' => 0,
])
<div class="selli-tabs__panel" role="tabpanel" x-show="active === {{ (int) $index }}" x-cloak {{ $attributes }}>
    {{ $slot }}
</div>
