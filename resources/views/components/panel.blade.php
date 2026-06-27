@props([
    'title' => null,
    'sub' => null,
])
<div {{ $attributes->class(['selli-panel']) }}>
    @if ($title || isset($action))
        <div class="selli-panel__header">
            <div style="min-width:0;">
                @if ($title)<div class="selli-panel__title">{{ $title }}</div>@endif
                @if ($sub)<div class="selli-panel__sub">{{ $sub }}</div>@endif
            </div>
            @isset($action){{ $action }}@endisset
        </div>
    @endif
    <div class="selli-panel__body">{{ $slot }}</div>
</div>
