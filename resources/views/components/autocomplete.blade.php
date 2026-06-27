@props([
    'options' => [],
    'placeholder' => 'Cerca…',
    'name' => null,
    'value' => '',
    'empty' => 'Nessun risultato',
    'label' => 'Cerca',
])
@php
    $base = 'selli-ac-'.uniqid();
    $listId = $base.'-list';
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
    x-data="selliAutocomplete({ options: @js($normalized), value: @js($value), id: @js($base) })"
    @click.outside="open = false"
>
    <div class="selli-input-wrap">
        <span class="selli-input-wrap__icon" aria-hidden="true"><x-selli::icon name="search" :size="18" /></span>
        <input
            type="text"
            class="selli-input selli-input--has-icon"
            placeholder="{{ $placeholder }}"
            aria-label="{{ $label }}"
            role="combobox"
            aria-autocomplete="list"
            aria-controls="{{ $listId }}"
            :aria-expanded="open ? 'true' : 'false'"
            :aria-activedescendant="activeId"
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
    <div class="selli-autocomplete__menu" id="{{ $listId }}" role="listbox" aria-label="{{ $label }}" x-show="open" x-cloak>
        <template x-for="(o, i) in filtered" :key="o.value">
            <div
                class="selli-autocomplete__option"
                role="option"
                :id="optId(i)"
                :aria-selected="i === active ? 'true' : 'false'"
                :class="{ 'selli-autocomplete__option--active': i === active }"
                @click="choose(i)"
                @mouseenter="active = i"
                x-text="o.label"
            ></div>
        </template>
        <template x-if="!filtered.length">
            <div class="selli-autocomplete__empty" role="status">{{ $empty }}</div>
        </template>
    </div>
</div>
