@props([
    'options' => [],
    'placeholder' => 'Cerca…',
    'name' => null,
    'value' => '',
    'empty' => 'Nessun risultato',
])
@php
    $normalized = [];
    foreach ($options as $k => $v) {
        if (is_array($v)) {
            $normalized[] = ['value' => $v['value'] ?? $v['label'] ?? '', 'label' => $v['label'] ?? $v['value'] ?? ''];
        } elseif (is_int($k)) {
            $normalized[] = ['value' => $v, 'label' => $v];
        } else {
            $normalized[] = ['value' => $k, 'label' => $v];
        }
    }
@endphp
<div
    {{ $attributes->class(['selli-autocomplete']) }}
    x-data="selliAutocomplete({ options: @js($normalized), value: @js($value) })"
    @click.outside="open = false"
>
    <div class="selli-input-wrap">
        <span class="selli-input-wrap__icon"><x-selli::icon name="search" :size="18" /></span>
        <input
            type="text"
            class="selli-input selli-input--has-icon"
            placeholder="{{ $placeholder }}"
            x-model="query"
            @focus="open = true"
            @keydown.arrow-down.prevent="move(1)"
            @keydown.arrow-up.prevent="move(-1)"
            @keydown.enter.prevent="choose(active)"
            @keydown.escape="open = false"
            autocomplete="off"
        >
    </div>
    <input type="hidden" x-ref="hidden" @if ($name) name="{{ $name }}" @endif x-model="selected">
    <div class="selli-autocomplete__menu" x-show="open" x-cloak>
        <template x-if="filtered.length">
            <div>
                <template x-for="(o, i) in filtered" :key="o.value">
                    <div
                        class="selli-autocomplete__option"
                        :class="{ 'selli-autocomplete__option--active': i === active }"
                        @click="choose(i)"
                        @mouseenter="active = i"
                        x-text="o.label"
                    ></div>
                </template>
            </div>
        </template>
        <template x-if="!filtered.length">
            <div class="selli-autocomplete__empty">{{ $empty }}</div>
        </template>
    </div>
</div>
