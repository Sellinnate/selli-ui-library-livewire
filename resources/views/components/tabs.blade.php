@props([
    'tabs' => [],
    'default' => 0,
])
<div {{ $attributes }} x-data="{ active: {{ (int) $default }} }">
    <div class="selli-tabs__list" role="tablist">
        @foreach ($tabs as $i => $label)
            <button
                type="button"
                class="selli-tabs__tab"
                role="tab"
                :class="{ 'selli-tabs__tab--active': active === {{ $i }} }"
                :aria-selected="active === {{ $i }}"
                @click="active = {{ $i }}"
            >{{ $label }}</button>
        @endforeach
    </div>
    {{ $slot }}
</div>
