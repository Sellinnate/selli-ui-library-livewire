---
title: "Theming & dark mode"
description: "Change the Selli UI brand colour, switch between dark and light, and adjust density — all through CSS tokens, no rebuild."
---

# Theming & dark mode

Everything in Selli UI is driven by **CSS custom properties** (tokens). To
re-theme, you change a token — you never edit component files.

## Dark vs light

Selli UI is **dark-first**. The dark palette lives on `:root`, and a `.light`
class on `<html>` swaps in the light surface.

```blade
{{-- Dark (default) --}}
<html class="dark"> … </html>

{{-- Light --}}
<html class="light"> … </html>
```

### A user-facing toggle

The `theme-toggle` component flips `.light` on `<html>` and remembers the choice
in the browser's `localStorage`:

```blade
<x-selli::theme-toggle />
```

To respect the saved choice on first paint (before any component renders), add a
tiny inline script high in your `<head>`:

```blade
<script>
    if (localStorage.getItem('selli-theme') === 'light') {
        document.documentElement.classList.add('light');
        document.documentElement.classList.remove('dark');
    }
</script>
```

## Colour themes

Selli UI ships **six built-in colour themes**: the default **violet** (the Selli
brand) plus **blue, emerald, amber, rose and cyan**. Switch by setting
`data-theme` on `<html>` (omit it, or use `violet`, for the default):

```blade
<html data-theme="emerald"> … </html>
```

Everything re-colours instantly — not just `--primary`, but the focus rings, the
signature glow, link hover, active nav items, charts and accent borders. That's
because those tokens **derive from `--primary`** via `color-mix`, so a theme only
needs to redefine one colour. (Light themes like amber also set a darker
`--primary-foreground` so text on the accent stays readable.)

### A user-facing colour switcher

The `theme-switcher` component is a palette dropdown of all six themes. It applies
`data-theme` and remembers the choice in `localStorage` under `selli-color`:

```blade
<x-selli::theme-switcher />

{{-- or restrict / relabel the choices --}}
<x-selli::theme-switcher :themes="['violet' => 'Brand', 'blue' => 'Ocean']" />
```

The **app shell** already includes it (next to the light/dark toggle) in its
topbar.

### Your own brand colour

Not limited to the six — override `--primary` (and optionally `--primary-hover`
and `--primary-foreground`) anywhere:

```css
:root {
    --primary: oklch(0.62 0.20 255);
    --primary-hover: oklch(0.55 0.22 258);
    --primary-foreground: oklch(1 0 0); /* readable text on the accent */
}
```

::: callout tip "Presets in PHP"
Read the preset list with `\Selli\Ui\Facades\SelliUi::colors()` (returns the six
`key => oklch` pairs from `config/selli-ui.php`).
:::

## Avoiding a flash on first paint

`selli-ui.js` restores the saved colour theme and appearance, but it loads
deferred — so for zero flash, inline this tiny script high in your `<head>`,
before the stylesheet:

```blade
<script>
    try {
        var c = localStorage.getItem('selli-color');
        if (c && c !== 'violet') document.documentElement.setAttribute('data-theme', c);
        if (localStorage.getItem('selli-theme') === 'light') {
            document.documentElement.classList.add('light');
            document.documentElement.classList.remove('dark');
        }
    } catch (e) {}
</script>
```

## Density

Form controls and buttons read their height/padding from **density tokens**. Set
`data-density` on `<html>` (or any ancestor) to `comfortable` (default), `cozy`
or `compact`:

```blade
<html data-density="compact"> … </html>
```

| Density | Control height |
|---|---|
| `comfortable` | 2.75rem (44px) |
| `cozy` | 2.5rem (40px) |
| `compact` | 2.25rem (36px) |

## The config file

`config/selli-ui.php` (after publishing) lets you set the defaults your app
ships with:

```php
return [
    'theme'   => 'dark',        // 'dark' | 'light'
    'primary' => 'violet',      // a key from the 'colors' preset list
    'density' => 'comfortable', // 'comfortable' | 'cozy' | 'compact'
    'colors'  => [
        'violet'  => 'oklch(0.65 0.28 290)',
        'blue'    => 'oklch(0.55 0.22 258)',
        'emerald' => 'oklch(0.72 0.18 155)',
        // …
    ],
];
```

::: callout info "Tokens are just CSS"
You can also pull the raw token files (`resources/css/tokens/*.css`) into your own
Tailwind or Vite build and reference the same variables in your custom code. See
**[Design tokens](/foundations/design-tokens)**.
:::
