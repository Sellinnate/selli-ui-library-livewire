@props([
    'type' => 'text',
    'icon' => null,
    'trailing' => null,
    'size' => 'md',
    'invalid' => false,
    'clearable' => false,
])
<div class="selli-input-wrap">
    @if ($icon)
        <span class="selli-input-wrap__icon"><x-selli::icon :name="$icon" :size="18" /></span>
    @endif
    <input
        type="{{ $type }}"
        {{ $attributes->class([
            'selli-input',
            'selli-input--'.$size => $size !== 'md',
            'selli-input--has-icon' => $icon,
            'selli-input--has-trailing' => $trailing || $clearable,
            'selli-input--invalid' => $invalid,
        ]) }}
        @if ($invalid) aria-invalid="true" @endif
    >
    @if ($clearable)
        <button
            type="button"
            class="selli-input-clear"
            aria-label="Cancella"
            onclick="const i=this.parentElement.querySelector('input');i.value='';i.dispatchEvent(new Event('input',{bubbles:true}));i.dispatchEvent(new Event('change',{bubbles:true}));i.focus();"
        ><x-selli::icon name="x" :size="15" /></button>
    @elseif ($trailing)
        <span class="selli-input-wrap__trailing">{{ $trailing }}</span>
    @endif
</div>
