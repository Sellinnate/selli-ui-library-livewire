---
title: "Components overview"
description: "A map of every Selli UI component, grouped by purpose, with links to detailed pages."
---

# Components overview

![Componenti Selli UI](/assets/components/card.png)

Every component is an anonymous Blade component under the `selli` namespace, so you
use it as `<x-selli::name>`. Sub-components use a dot, e.g. `<x-selli::card.title>`.

Three things are true of (almost) every component:

1. **Extra attributes pass through.** `class`, `id`, `wire:model`, `x-on:click`,
   `data-*` — anything not listed as a prop lands on the root element.
2. **Styling is class-based and token-driven.** No inline colours; everything
   re-themes with the design tokens.
3. **Interactivity uses Alpine** (bundled with Livewire), never bespoke scripts.

## The groups

| Group | Components | Page |
|---|---|---|
| **Actions** | button, button-group, dropdown, context-menu, menu (+ item/label/separator), popover, tabs, accordion | [Buttons & actions](/components/actions) |
| **Display & content** | card (+ icon/title/body), stat, eyebrow, section-heading, avatar (+ group), brand, badge, separator | [Display & content](/components/display) |
| **Forms & inputs** | field, input, textarea, checkbox, radio, switch, checkbox-group, radio-group, select, autocomplete, editor | [Forms & inputs](/components/forms) |
| **Data display** | table, chart, sparkline, donut, calendar, datepicker | [Data display](/components/data) |
| **Feedback** | callout, tooltip, spinner, progress, skeleton, dot, kbd | [Feedback](/components/feedback) |
| **Navigation** | navbar, navlist (+ item/label), breadcrumbs, pagination, command | [Navigation](/components/navigation) |
| **Overlays** | modal, toast-host, popover | [Overlays](/components/overlays) |
| **Layout** | app-shell, panel, stat-card, page-head, empty-state, theme-toggle, `.selli-grid` | [Layout & app shell](/components/layout) |

A single flat list of all tags is on the **[reference page](/reference/components)**.

::: callout tip "Reading the prop tables"
Each component page lists its **props** — the named options you can set on the
tag. A prop written `:foo="$bar"` (with a colon) passes a PHP value; `foo="bar"`
passes a literal string. Boolean props are set with `:prop="true"` /
`:prop="false"`.
:::
