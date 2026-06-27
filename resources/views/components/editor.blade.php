@props([
    'name' => null,
    'value' => '',
    'placeholder' => 'Scrivi qualcosa…',
    'label' => 'Editor di testo',
])
<div {{ $attributes->class(['selli-editor']) }} x-data="selliEditor()">
    <div class="selli-editor__toolbar" role="toolbar" aria-label="Formattazione">
        <button type="button" class="selli-editor__btn selli-focusable" @click="cmd('bold')" aria-label="Grassetto" title="Grassetto" style="font-weight:700;">B</button>
        <button type="button" class="selli-editor__btn selli-focusable" @click="cmd('italic')" aria-label="Corsivo" title="Corsivo" style="font-style:italic;">I</button>
        <button type="button" class="selli-editor__btn selli-focusable" @click="cmd('underline')" aria-label="Sottolineato" title="Sottolineato" style="text-decoration:underline;">U</button>
        <button type="button" class="selli-editor__btn selli-focusable" @click="cmd('insertUnorderedList')" aria-label="Elenco puntato" title="Elenco puntato"><x-selli::icon name="list" :size="16" /></button>
    </div>
    <div
        class="selli-editor__area selli-scroll"
        contenteditable="true"
        role="textbox"
        aria-multiline="true"
        aria-label="{{ $label }}"
        tabindex="0"
        data-placeholder="{{ $placeholder }}"
        x-ref="area"
        @input="sync()"
    >{!! $value !!}</div>
    <input type="hidden" x-ref="hidden" @if ($name) name="{{ $name }}" @endif value="{{ $value }}">
</div>
