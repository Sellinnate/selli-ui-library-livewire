@props([
    'icon' => 'box',
    'title' => null,
    'desc' => null,
])
<div {{ $attributes->class(['selli-empty']) }}>
    <span class="selli-empty__icon"><x-selli::icon :name="$icon" :size="28" color="var(--muted-foreground)" /></span>
    @if ($title)<div class="selli-empty__title">{{ $title }}</div>@endif
    @if ($desc)<div class="selli-empty__desc">{{ $desc }}</div>@endif
    @isset($action)<div>{{ $action }}</div>@endisset
    {{ $slot }}
</div>
