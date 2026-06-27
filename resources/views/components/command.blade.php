@props([
    'items' => [],
    'placeholder' => 'Cerca comandi…',
    'empty' => 'Nessun risultato',
    'label' => 'Cerca un comando',
])
@php
    $listId = 'selli-cmd-list-'.uniqid();
    $normalized = [];
    foreach ($items as $item) {
        if (is_array($item)) {
            $normalized[] = [
                'label' => $item['label'] ?? '',
                'shortcut' => $item['shortcut'] ?? null,
                'url' => $item['url'] ?? null,
                'group' => $item['group'] ?? null,
            ];
        } else {
            $normalized[] = ['label' => $item, 'shortcut' => null, 'url' => null, 'group' => null];
        }
    }
@endphp
<div {{ $attributes }} x-data="selliCommand({ items: @js($normalized) })">
    <template x-teleport="body">
        <div class="selli-command__backdrop" x-show="open" x-cloak @click.self="close()" @keydown.escape.window="close()">
            <div
                class="selli-command"
                role="dialog"
                aria-modal="true"
                aria-label="{{ $label }}"
                @keydown.arrow-down.prevent="move(1)"
                @keydown.arrow-up.prevent="move(-1)"
                @keydown.enter.prevent="run()"
            >
                <div class="selli-command__search">
                    <span aria-hidden="true"><x-selli::icon name="search" :size="18" color="var(--muted-foreground)" /></span>
                    <input
                        class="selli-command__input"
                        type="text"
                        aria-label="{{ $label }}"
                        role="combobox"
                        aria-controls="{{ $listId }}"
                        aria-autocomplete="list"
                        :aria-expanded="open ? 'true' : 'false'"
                        :aria-activedescendant="activeId"
                        x-model="query"
                        x-ref="input"
                        placeholder="{{ $placeholder }}"
                        autocomplete="off"
                    >
                    <x-selli::kbd>ESC</x-selli::kbd>
                </div>
                <div class="selli-command__list" id="{{ $listId }}" role="listbox" aria-label="{{ $label }}">
                    <template x-for="(it, i) in filtered" :key="i">
                        <a
                            class="selli-command__item"
                            role="option"
                            :id="optId(i)"
                            :aria-selected="i === active ? 'true' : 'false'"
                            :class="{ 'selli-command__item--active': i === active }"
                            @click.prevent="run(i)"
                            @mouseenter="active = i"
                            :href="it.url || null"
                        >
                            <span x-text="it.label"></span>
                            <template x-if="it.shortcut">
                                <span class="selli-command__item-shortcut"><kbd class="selli-kbd" x-text="it.shortcut"></kbd></span>
                            </template>
                        </a>
                    </template>
                    <template x-if="!filtered.length">
                        <div class="selli-command__empty" role="status">{{ $empty }}</div>
                    </template>
                </div>
            </div>
        </div>
    </template>
</div>
