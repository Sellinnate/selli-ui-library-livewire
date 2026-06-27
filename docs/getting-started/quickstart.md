---
title: "Quickstart"
description: "Build a complete, on-brand application page in a few minutes by composing Selli UI components."
---

# Quickstart

We'll build a small **dashboard page** from scratch using the app shell, a page
header, stat cards and a table. By the end you'll understand how Selli UI
components compose.

This assumes you finished **[Installation](/getting-started/installation)**.

## 1. The application shell

The `app-shell` component is a full page chrome: a sticky sidebar on the left
(brand + navigation + user) and a main area with a sticky topbar and a centered,
scrolling content region. You fill it with **slots**.

```blade
<x-selli::app-shell title="Dashboard">
    {{-- the sidebar navigation --}}
    <x-slot:sidebar>
        <x-selli::navlist>
            <x-selli::navlist.item icon="layout-dashboard" href="/dashboard" :active="true">Dashboard</x-selli::navlist.item>
            <x-selli::navlist.item icon="users" href="/clients">Clienti</x-selli::navlist.item>
            <x-selli::navlist.item icon="settings" href="/settings">Impostazioni</x-selli::navlist.item>
        </x-selli::navlist>
    </x-slot:sidebar>

    {{-- the account block pinned to the bottom of the sidebar --}}
    <x-slot:user>
        <x-selli::avatar name="Filippo Calabrese" size="sm" status="online" />
    </x-slot:user>

    {{-- everything below is the main page content --}}
    <p>Ciao, mondo.</p>
</x-selli::app-shell>
```

::: callout info "What is a slot?"
A **slot** is a named hole in a component you fill with your own markup.
`<x-slot:sidebar>…</x-slot:sidebar>` fills the shell's *sidebar* slot. Anything
not inside a named slot goes into the **default slot** — here, the main content.
:::

## 2. A page header

Inside the content, start with a `page-head` — a title, a subtitle and an action
area:

```blade
<x-selli::page-head title="Buongiorno, Filippo" sub="Ecco cosa succede oggi.">
    <x-slot:actions>
        <x-selli::button variant="ghost" icon="download">Esporta</x-selli::button>
        <x-selli::button icon="plus">Nuovo</x-selli::button>
    </x-slot:actions>
</x-selli::page-head>
```

## 3. A row of stat cards

`stat-card` shows a metric with an optional trend and mini-chart. The
`selli-grid` helper class lays them out responsively.

```blade
<div class="selli-grid selli-grid--4">
    <x-selli::stat-card icon="dollar-sign" label="Ricavi" value="€48.250" delta="+12%" :spark="[12,18,15,22,26,31]" />
    <x-selli::stat-card icon="users" label="Clienti" value="312" delta="+8%" accent="var(--blue-500)" />
    <x-selli::stat-card icon="shopping-cart" label="Ordini" value="1.204" delta="-2%" delta-dir="down" />
    <x-selli::stat-card icon="gauge" label="Conversione" value="3,8%" delta="+0,6%" accent="var(--success)" />
</div>
```

## 4. A table inside a panel

`panel` is a titled container. `table` can render straight from PHP arrays:

```blade
<x-selli::panel title="Attività recenti" class="mt-5">
    <x-selli::table
        :columns="[
            ['key' => 'cliente', 'label' => 'Cliente'],
            ['key' => 'importo', 'label' => 'Importo', 'numeric' => true],
        ]"
        :rows="[
            ['cliente' => 'Acme S.r.l.', 'importo' => '€2.400'],
            ['cliente' => 'Globex SpA', 'importo' => '€1.150'],
        ]"
    />
</x-selli::panel>
```

## The full picture

Put those four pieces together inside the shell's content area and you have a
complete, on-brand dashboard — without writing a single line of CSS.

::: callout tip "See it finished"
The full Dashboard, plus a CRM list and a Settings screen, are documented in
**[Examples](/examples/pages)** and shipped as ready-to-render Blade views in the
package (`resources/views/examples/`).
:::

## Where to go next

- **[Theming](/getting-started/theming)** — change the brand colour or enable a
  light/dark toggle.
- **[Using with Livewire](/getting-started/livewire)** — make the forms and
  tables reactive.
- **[Components overview](/components/overview)** — browse everything available.
