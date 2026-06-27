---
title: "Overlays"
description: "modal, toast-host and popover — floating surfaces that sit above the page."
---

# Overlays

## Modal

![Modal](/assets/components/modal.png)

A centered dialog with a blurred backdrop. It's **event-driven**: open it by
dispatching `selli-open-modal` with the modal's `name`. It also teleports itself to
`<body>` so it always sits above everything.

```blade
{{-- the trigger (anywhere) --}}
<x-selli::button x-on:click="$dispatch('selli-open-modal', 'edit-client')">
    Modifica
</x-selli::button>

{{-- the modal (often near the end of the view) --}}
<x-selli::modal name="edit-client" title="Modifica cliente" size="lg">
    <p>Contenuto della finestra…</p>
    <x-slot:footer>
        <x-selli::button variant="ghost" x-on:click="$dispatch('selli-close-modal')">Annulla</x-selli::button>
        <x-selli::button wire:click="save">Salva</x-selli::button>
    </x-slot:footer>
</x-selli::modal>
```

| Prop | Default | Description |
|---|---|---|
| `name` | — | Identifier used by the open/close events. |
| `title` | — | Header title. |
| `size` | `md` | `sm`, `md`, `lg`, `xl`. |

Slots: `trigger` (optional inline opener), default (body), `footer`. It closes on
backdrop click, the × button, or `Esc`.

::: callout info "Opening from PHP"
From a Livewire component: `$this->dispatch('selli-open-modal', 'edit-client');`
To close all modals: dispatch `selli-close-modal` with no payload.
:::

## Toast host

Drop **one** host near the end of your layout. Then fire toasts from anywhere.

```blade
<x-selli::toast-host />
```

```js
window.selliToast({ title: 'Salvato', message: 'Modifiche applicate.', variant: 'success', timeout: 4000 });
```

`variant` is `info` (default), `success`, `warning` or `danger`. Set `timeout: 0`
to make a toast sticky. From Livewire: `$this->js("window.selliToast({ … })")`.

## Popover

Documented with the actions, since it pairs with a trigger button — see
**[Buttons & actions › Popover](/components/actions)**. Use it for any floating
content (not just menus).
