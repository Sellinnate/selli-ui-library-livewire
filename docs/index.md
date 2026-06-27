---
title: "Selli UI — Blade & Livewire 4 component library"
description: "An enterprise UI component library for Laravel, built on the Selli Design System: Electric Violet, dark-first, themeable through CSS tokens."
image: "https://selli-ui-livewire.selli.io/assets/banner.jpg"
ogImage: "https://selli-ui-livewire.selli.io/assets/banner.jpg"
---

![Selli UI for Livewire — Blade & Livewire component library](/assets/banner.jpg)

# Selli UI

**Selli UI** is a ready-to-use set of interface components for **Laravel**
applications. You drop a tag like `<x-selli::button>` into a Blade view and get a
polished, on-brand button — no CSS to write, no JavaScript to wire up.

It is built on the **Selli Design System**: Electric Violet as the accent colour,
the *Instrument Sans* typeface, a dark-first look, and a signature soft violet
glow on interactive elements. Every component is themeable, works in light and
dark mode, and ships with automated tests.

::: callout tip "Brand new to component libraries? Start here"
If you have never used Blade components or Livewire before, read
**[What is Selli UI?](/getting-started/what-is-selli-ui)** first (≈5 min, assumes
zero background). Then follow the **[Quickstart](/getting-started/quickstart)** to
put a real page on screen.
:::

## What you get

- **60+ components** — buttons, cards, forms, tables, charts, modals, dropdowns,
  a command palette (⌘K), a full application shell, and more.
- **One design language** — everything uses the same colour, spacing, radius and
  motion *tokens*, so a page built from these parts looks intentional, not
  stitched together.
- **Dark-first, fully themeable** — switch the whole app's accent colour or flip
  to light mode by changing a CSS variable. No rebuild required.
- **Livewire 4 ready** — inputs forward `wire:model` straight through, and the
  interactive parts use Alpine (which Livewire already ships).
- **Tested** — every component has PHP (Pest) tests, and the interactive ones
  have browser (Playwright) tests.

## A 30-second taste

```blade
<x-selli::card>
    <x-selli::card.icon name="sparkles" />
    <x-selli::card.title>Componenti enterprise</x-selli::card.title>
    <x-selli::card.body>Pronti per la produzione, testati e documentati.</x-selli::card.body>
    <x-selli::button class="mt-4" icon-right="arrow-right">Scopri di più</x-selli::button>
</x-selli::card>
```

## How this documentation is organised

1. **Getting Started** — install the package and build your first page.
2. **Foundations** — the colour, type, spacing and icon system everything is
   built on.
3. **Components** — every component, grouped by purpose, with copy-paste
   examples and a full list of options.
4. **Examples** — three complete demo pages (Dashboard, CRM, Settings).
5. **Reference** — a single table of every component and its tag.

::: callout info "Conventions used in these docs"
Code you type in a terminal is shown in a `bash` block. Code that goes in a Blade
view is shown in a `blade` block. Component options (called **props**) are listed
in tables — the *attribute* is what you write in the tag.
:::
