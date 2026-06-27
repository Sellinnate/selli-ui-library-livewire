@props([
    'attached' => true,
])
<div role="group" {{ $attributes->class([
    'selli-btn-group',
    'selli-btn-group--attached' => $attached,
    'selli-btn-group--spaced' => ! $attached,
]) }}>
    {{ $slot }}
</div>
