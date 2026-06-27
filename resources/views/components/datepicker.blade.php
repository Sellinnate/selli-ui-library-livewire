@props([
    'name' => null,
    'value' => null,        // 'Y-m-d'
    'placeholder' => 'Seleziona una data',
])
<div {{ $attributes->class(['selli-datepicker']) }} x-data="selliDatePicker({ value: @js($value) })" @click.outside="open = false">
    <div class="selli-input-wrap">
        <span class="selli-input-wrap__icon"><x-selli::icon name="calendar" :size="18" /></span>
        <input
            type="text"
            class="selli-input selli-input--has-icon"
            placeholder="{{ $placeholder }}"
            readonly
            x-model="display"
            @click="open = ! open"
            @keydown.escape="open = false"
        >
    </div>
    <input type="hidden" x-ref="hidden" @if ($name) name="{{ $name }}" @endif x-model="value">
    <div class="selli-datepicker__pop" x-show="open" x-cloak x-transition.origin.top>
        <div class="selli-calendar">
            <div class="selli-calendar__header">
                <span class="selli-calendar__title" x-text="title"></span>
                <div class="selli-calendar__nav">
                    <button type="button" class="selli-calendar__nav-btn" @click="prev()" aria-label="Mese precedente"><x-selli::icon name="chevron-left" :size="16" /></button>
                    <button type="button" class="selli-calendar__nav-btn" @click="next()" aria-label="Mese successivo"><x-selli::icon name="chevron-right" :size="16" /></button>
                </div>
            </div>
            <div class="selli-calendar__grid" role="grid">
                <template x-for="d in dow" :key="d"><div class="selli-calendar__dow" x-text="d"></div></template>
                <template x-for="(cell, i) in cells" :key="i">
                    <button
                        type="button"
                        x-show="cell"
                        class="selli-calendar__day"
                        :class="{ 'selli-calendar__day--selected': cell && cell.iso === value, 'selli-calendar__day--today': cell && cell.today }"
                        @click="pick(cell)"
                        x-text="cell ? cell.day : ''"
                    ></button>
                </template>
            </div>
        </div>
    </div>
</div>
