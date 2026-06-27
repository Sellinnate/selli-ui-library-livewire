@props([
    'tabs' => [],
    'default' => 0,
])
@php $base = 'selli-tabs-'.uniqid(); @endphp
<div {{ $attributes }} x-data="selliTabs({ default: {{ (int) $default }}, count: {{ count($tabs) }} })">
    <div
        class="selli-tabs__list"
        role="tablist"
        @keydown.arrow-right.prevent="move(1)"
        @keydown.arrow-left.prevent="move(-1)"
        @keydown.home.prevent="first()"
        @keydown.end.prevent="last()"
    >
        @foreach ($tabs as $i => $label)
            <button
                type="button"
                class="selli-tabs__tab"
                role="tab"
                id="{{ $base }}-tab-{{ $i }}"
                data-index="{{ $i }}"
                aria-controls="{{ $base }}-panel-{{ $i }}"
                :class="{ 'selli-tabs__tab--active': active === {{ $i }} }"
                :aria-selected="active === {{ $i }} ? 'true' : 'false'"
                :tabindex="active === {{ $i }} ? 0 : -1"
                @click="active = {{ $i }}"
            >{{ $label }}</button>
        @endforeach
    </div>
    {{ $slot }}
</div>
