---
title: "Icons"
description: "The Selli icon set: 119 stroke icons drawn with currentColor, and the icon component that renders them."
---

# Icons

Selli UI ships a set of **119 stroke icons** (extended Lucide geometry): 24×24, 2px
stroke, round caps and joins, drawn with `currentColor` so they inherit text
colour. They're defined in the PHP class `Selli\Ui\Icons` and rendered inline as
SVG by the `icon` component.

## Basic usage

```blade
<x-selli::icon name="rocket" />
<x-selli::icon name="bell" :size="24" />
<x-selli::icon name="check" color="var(--success)" />
```

| Prop | Default | Description |
|---|---|---|
| `name` | — | The icon name (kebab-case). |
| `size` | `20` | Width and height in px. |
| `strokeWidth` | `2` | Stroke thickness. |
| `color` | `currentColor` | Any CSS colour or token. |
| `title` | — | Accessible label. When set, the icon gets `role="img"` + `<title>`; otherwise it's `aria-hidden`. |

::: callout info "Inherit colour automatically"
Because icons use `currentColor`, an icon inside a button or coloured text takes
that colour with no extra work. Most components that accept an `icon` prop render
one for you (buttons, badges, menu items, callouts, nav items…).
:::

## Accessibility

- **Decorative** icon (next to a text label): leave `title` off — it renders
  `aria-hidden="true"` and screen readers skip it.
- **Meaningful** icon (icon-only button): pass `title` so it's announced.

```blade
{{-- decorative --}}
<x-selli::button icon="plus">Aggiungi</x-selli::button>

{{-- meaningful, icon-only --}}
<button aria-label="Notifiche"><x-selli::icon name="bell" title="Notifiche" /></button>
```

## Available icons

The set covers arrows & chevrons, UI controls, actions, status & feedback, people,
files, data/tech, charts, commerce and common glyphs. Get the full list in PHP:

```php
\Selli\Ui\Icons::names();   // array of all 119 names
\Selli\Ui\Icons::has('rocket');  // true
```

A selection: `arrow-right`, `chevron-down`, `menu`, `x`, `search`, `settings`,
`check`, `plus`, `trash-2`, `pencil`, `download`, `upload`, `bell`, `info`,
`alert-triangle`, `circle-check`, `user`, `users`, `home`, `folder`, `file-text`,
`calendar`, `mail`, `database`, `layout-dashboard`, `bar-chart-3`, `line-chart`,
`trending-up`, `credit-card`, `dollar-sign`, `star`, `heart`, `shield-check`,
`lock`, `sun`, `moon`, `sparkles`, `zap`, `rocket`.

::: callout tip "Missing an icon?"
Add it to the `PATHS` array in `src/Icons.php` (inner SVG markup for a 24×24
viewBox) and it's instantly available as `<x-selli::icon name="your-icon" />`.
:::
