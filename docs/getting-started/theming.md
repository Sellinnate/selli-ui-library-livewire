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

## Changing the brand colour

The accent colour is the token `--primary` (Electric Violet by default). Override
it anywhere — globally on `:root`, or scoped to a section:

```css
:root {
    --primary: oklch(0.62 0.20 255); /* a blue brand */
}
```

Because every component reads `--primary`, the whole UI re-colours instantly —
buttons, focus rings, active nav items, charts, the glow.

::: callout tip "Built-in presets"
The config file ships colour presets (violet, blue, emerald, amber, rose). Read
them in PHP with `\Selli\Ui\Facades\SelliUi::colors()`, or wire a runtime
switcher that sets `--primary` to one of those values.
:::

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
