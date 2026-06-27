---
title: "Navigation"
description: "navbar, navlist, breadcrumbs, pagination and the ⌘K command palette."
---

# Navigation

## Navbar

A sticky top bar with glass blur. Three slots: `start`, `center`, `end`.

```blade
<x-selli::navbar>
    <x-slot:start><x-selli::brand /></x-slot:start>
    <x-slot:end>
        <x-selli::button size="sm" variant="ghost">Accedi</x-selli::button>
        <x-selli::button size="sm">Registrati</x-selli::button>
    </x-slot:end>
</x-selli::navbar>
```

## Navlist

![Navlist](/assets/components/navlist.png)

A vertical navigation list (the sidebar menu). Use `navlist.label` for section
titles and `navlist.item` for links.

```blade
<x-selli::navlist>
    <x-selli::navlist.label>Generale</x-selli::navlist.label>
    <x-selli::navlist.item icon="layout-dashboard" href="/dashboard" :active="true">Dashboard</x-selli::navlist.item>
    <x-selli::navlist.item icon="users" href="/clients">
        Clienti
        <x-slot:badge><x-selli::badge tone="violet">12</x-selli::badge></x-slot:badge>
    </x-selli::navlist.item>
</x-selli::navlist>
```

`navlist.item` props: `icon`, `href` (renders `<a>`), `active` (highlights +
`aria-current`). A `badge` slot pins content to the right.

## Breadcrumbs

![Breadcrumbs](/assets/components/breadcrumbs.png)

```blade
<x-selli::breadcrumbs :items="[
    ['label' => 'Home', 'url' => '/'],
    ['label' => 'Clienti', 'url' => '/clienti'],
    ['label' => 'Acme'],
]" />
```

The last item (or any without a `url`) renders as the current page. Pass `items`
as `['label'=>, 'url'=>]` maps, or omit and slot your own.

## Pagination

![Pagination](/assets/components/pagination.png)

```blade
<x-selli::pagination :current="5" :total="20" url="?page=:page" />
```

| Prop | Default | Description |
|---|---|---|
| `current` | `1` | Current page. |
| `total` | `1` | Total pages. |
| `around` | `1` | How many pages to show either side of current. |
| `url` | — | URL pattern; `:page` is replaced. Omit to get plain buttons (wire them yourself). |

It builds a windowed range with ellipses, plus disabled prev/next at the ends.

::: callout tip "With Livewire pagination"
Omit `url` and add `wire:click` handlers, or just render Laravel's paginator and
style it — the pagination component is presentational.
:::

## Command palette (⌘K)

A searchable command launcher. Opens on **⌘K / Ctrl-K**, on a `selli-open-command`
event, and filters as you type.

```blade
<x-selli::command :items="[
    ['label' => 'Vai alla Dashboard', 'shortcut' => 'D', 'url' => '/dashboard'],
    ['label' => 'Apri il CRM', 'shortcut' => 'C', 'url' => '/crm'],
    ['label' => 'Crea cliente'],
]" />

{{-- open it from a button too: --}}
<x-selli::button x-on:click="window.dispatchEvent(new CustomEvent('selli-open-command'))">
    Cerca…
</x-selli::button>
```

| Prop | Description |
|---|---|
| `items` | List of `['label'=>, 'shortcut'=>, 'url'=>]` (or plain strings). |
| `placeholder` | Search box placeholder. |
| `empty` | No-results text. |

The `app-shell`'s built-in search button already dispatches `selli-open-command`,
so dropping a `<x-selli::command>` on the page wires up its ⌘K box for free.
