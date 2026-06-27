---
title: "Buttons & actions"
description: "Button, button-group, dropdown, context-menu, menu, popover, tabs and accordion components."
---

# Buttons & actions

![Pulsanti Selli UI](/assets/components/button.png)

## Button

The primary call to action. Renders a `<button>`, or an `<a>` when you pass
`href`.

```blade
<x-selli::button>Salva</x-selli::button>
<x-selli::button variant="secondary" icon="download">Esporta</x-selli::button>
<x-selli::button variant="ghost" icon-right="arrow-right">Avanti</x-selli::button>
<x-selli::button href="/clienti" variant="link">Vai ai clienti</x-selli::button>
<x-selli::button :disabled="true">Non disponibile</x-selli::button>
```

| Prop | Default | Description |
|---|---|---|
| `variant` | `primary` | `primary`, `secondary`, `ghost`, `link`, `blue`. |
| `size` | `md` | `sm`, `md`, `lg`. |
| `icon` | — | Leading icon name. |
| `iconRight` | — | Trailing icon (slides on hover). Attribute: `icon-right`. |
| `href` | — | Renders an `<a>` instead of a `<button>`. |
| `as` | — | Force a specific tag. |
| `type` | `button` | The button `type` (when not a link). |
| `disabled` | `false` | Greys out and blocks interaction. |
| `pulse` | `false` | Pulsing glow (primary only). |
| `full` | `false` | Full width. |

## Button group

![Button group](/assets/components/button-group.png)

Joins related buttons. `attached` (default) merges them into one pill; set it to
`false` for spaced buttons.

```blade
<x-selli::button-group>
    <x-selli::button variant="secondary">Giorno</x-selli::button>
    <x-selli::button variant="secondary">Settimana</x-selli::button>
    <x-selli::button variant="secondary">Mese</x-selli::button>
</x-selli::button-group>
```

| Prop | Default | Description |
|---|---|---|
| `attached` | `true` | `true` = joined pill, `false` = spaced. |

## Menu

![Menu a tendina](/assets/components/menu.png)

A styled menu surface and its items — used inside dropdowns and context menus, or
on its own.

```blade
<x-selli::menu>
    <x-selli::menu.label>Azioni</x-selli::menu.label>
    <x-selli::menu.item icon="pencil" shortcut="E">Modifica</x-selli::menu.item>
    <x-selli::menu.separator />
    <x-selli::menu.item icon="trash-2" :danger="true">Elimina</x-selli::menu.item>
</x-selli::menu>
```

`menu.item` props: `icon`, `href` (renders `<a>`), `shortcut`, `danger`,
`disabled`.

## Dropdown

![Dropdown](/assets/components/dropdown.png)

A trigger that toggles a `menu`. Put the trigger in the `trigger` slot and the
items in the default slot. Closes on outside-click or `Esc`.

```blade
<x-selli::dropdown align="end">
    <x-slot:trigger>
        <x-selli::button variant="secondary" icon-right="chevron-down">Opzioni</x-selli::button>
    </x-slot:trigger>
    <x-selli::menu.item icon="user">Profilo</x-selli::menu.item>
    <x-selli::menu.item icon="settings">Impostazioni</x-selli::menu.item>
</x-selli::dropdown>
```

| Prop | Default | Description |
|---|---|---|
| `align` | `start` | `start` (left) or `end` (right). |

## Context menu

Like a dropdown, but opened by **right-clicking** the trigger area.

```blade
<x-selli::context-menu>
    <x-slot:trigger><div class="selli-card">Clic destro qui</div></x-slot:trigger>
    <x-selli::menu.item icon="copy">Copia</x-selli::menu.item>
    <x-selli::menu.item icon="trash-2" :danger="true">Elimina</x-selli::menu.item>
</x-selli::context-menu>
```

## Popover

![Popover](/assets/components/popover.png)

Like a dropdown, but the panel holds **any** content, not just menu items.

```blade
<x-selli::popover align="start">
    <x-slot:trigger><x-selli::button variant="ghost" icon="info">Dettagli</x-selli::button></x-slot:trigger>
    <x-selli::heading :level="5">Spazio occupato</x-selli::heading>
    <x-selli::progress :value="64" class="mt-2" />
</x-selli::popover>
```

## Tabs

![Tabs](/assets/components/tabs.png)

Switch between panels without a page reload (Alpine). `tabs` takes the labels;
each `tab-panel` declares its `index`.

```blade
<x-selli::tabs :tabs="['Generale', 'Avanzate']" :default="0">
    <x-selli::tab-panel :index="0">Contenuto generale…</x-selli::tab-panel>
    <x-selli::tab-panel :index="1">Contenuto avanzato…</x-selli::tab-panel>
</x-selli::tabs>
```

| Component | Prop | Description |
|---|---|---|
| `tabs` | `tabs` | Array of tab labels. |
| `tabs` | `default` | Index of the initially active tab. |
| `tab-panel` | `index` | Which tab this panel belongs to. |

## Accordion

![Accordion](/assets/components/accordion.png)

Collapsible sections built on the native `<details>` element (works even without
JavaScript).

```blade
<x-selli::accordion>
    <x-selli::accordion.item heading="Come funziona la fatturazione?" :open="true">
        Ti addebitiamo il primo di ogni mese.
    </x-selli::accordion.item>
    <x-selli::accordion.item heading="Posso disdire?">
        Sì, in qualsiasi momento.
    </x-selli::accordion.item>
</x-selli::accordion>
```

`accordion.item` props: `heading`, `open` (start expanded).
