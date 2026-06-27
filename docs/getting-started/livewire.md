---
title: "Using with Livewire"
description: "How Selli UI form controls work with wire:model, and how the interactive components cooperate with Livewire and Alpine."
---

# Using with Livewire

Selli UI is designed for **Livewire 4**, but it does not force it on you. The
display components are plain HTML/CSS; only the interactive ones use Alpine (which
Livewire already bundles).

## Form inputs and `wire:model`

Every form control is an *anonymous* Blade component, so any attribute you add to
the tag — including `wire:model` — is forwarded straight to the underlying native
`<input>`, `<select>` or `<textarea>`. That means they "just work" with Livewire:

```blade
<x-selli::field label="Nome" for="name">
    <x-selli::input id="name" wire:model="name" placeholder="Il tuo nome" />
</x-selli::field>

<x-selli::switch label="Newsletter" wire:model.live="subscribed" />

<x-selli::select wire:model="plan" :options="['free' => 'Free', 'pro' => 'Pro']" placeholder="Scegli un piano" />
```

::: callout info "Why this works"
Anonymous components declare their own options with `@props`. Everything *not*
declared as a prop ends up in the component's `$attributes` bag and is rendered on
the real form element. `wire:model` is not a Selli prop, so it lands on the
`<input>` — exactly where Livewire needs it.
:::

## Validation errors

Pair `field` with Livewire's validation. Pass the message to the `error` prop and
mark the input invalid:

```blade
<x-selli::field label="Email" for="email" :error="$errors->first('email')">
    <x-selli::input id="email" type="email" wire:model="email" :invalid="$errors->has('email')" />
</x-selli::field>
```

When `error` is present the field shows it in danger red with an icon; `:invalid`
turns the input's border and focus ring red.

## Interactive components

Dropdowns, modals, tabs, the command palette, toasts, the date picker and the
autocomplete use **Alpine**. In a Livewire app Alpine is already present, so they
need no extra setup beyond loading `selli-ui.js` (see
**[Installation](/getting-started/installation)**).

### Opening a modal from Livewire

The `modal` listens for a browser event. Dispatch it from a Livewire action or a
plain button:

```blade
<x-selli::button x-on:click="$dispatch('selli-open-modal', 'confirm-delete')">
    Elimina
</x-selli::button>

<x-selli::modal name="confirm-delete" title="Confermi?">
    <p>L'operazione non è reversibile.</p>
    <x-slot:footer>
        <x-selli::button variant="ghost" x-on:click="$dispatch('selli-close-modal')">Annulla</x-selli::button>
        <x-selli::button wire:click="delete">Elimina</x-selli::button>
    </x-slot:footer>
</x-selli::modal>
```

From PHP you can also `$this->dispatch('selli-open-modal', 'confirm-delete')`.

### Toasts from the server

Drop the host once in your layout:

```blade
<x-selli::toast-host />
```

Then trigger a toast from anywhere in JavaScript:

```js
window.selliToast({ title: 'Salvato', message: 'Modifiche applicate.', variant: 'success' });
```

…or from a Livewire component by dispatching a browser event that calls it:

```php
$this->js("window.selliToast({ title: 'Salvato', variant: 'success' })");
```

::: callout tip "Renderless-friendly"
Because the interactive state lives in Alpine, opening a dropdown or switching a
tab does **not** round-trip to the server — it stays instant even inside a
Livewire component.
:::
