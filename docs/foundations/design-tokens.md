---
title: "Design tokens"
description: "The complete set of CSS custom properties (tokens) that drive every Selli UI component: colours, type, spacing, radius, effects, motion and density."
---

# Design tokens

A **token** is a named design value stored as a CSS custom property. Components
never hard-code colours or sizes — they reference tokens. Change a token, and
everything that uses it updates. This is the single most important idea in the
library.

The tokens are split into small CSS files under `resources/css/tokens/` and pulled
together by `resources/css/selli-ui.css`.

::: callout info "Where tokens live"
`:root` carries the **dark** palette (dark-first). The `.light` class overrides
the colour tokens for the light surface. Layout, type, spacing and effect tokens
are shared by both.
:::

## Colour tokens

The most-used colour tokens (full list on the **[Colors](/foundations/colors)**
page):

| Token | Meaning |
|---|---|
| `--primary` | The brand accent (Electric Violet). Change this to re-theme. |
| `--background` / `--foreground` | Page background / main text. |
| `--card` | Card / panel surface. |
| `--muted-foreground` | Secondary, lower-contrast text. |
| `--border` / `--border-strong` | Hairline / stronger borders. |
| `--surface-raised` | Faint raised fill (inputs, chips). |
| `--success` / `--warning` / `--danger` | Semantic states. |

## Typography tokens

| Token | Value |
|---|---|
| `--font-sans` | Instrument Sans (brand face). |
| `--text-xs` … `--text-7xl` | The type scale (0.75rem → 4.5rem). |
| `--weight-regular/medium/semibold/bold` | 400 / 500 / 600 / 700. |
| `--leading-tight/normal/relaxed` | Line heights. |
| `--tracking-tight/wider` | Letter spacing. |

## Spacing, radius & layout

| Token | Value |
|---|---|
| `--space-1` … `--space-24` | 4px-based spacing scale. |
| `--radius` | Base corner radius (0.65rem). |
| `--radius-sm/md/lg/xl/2xl/3xl/4xl` | Step-up radii. |
| `--radius-full` | Pills (buttons, badges). |
| `--container-max` | 1280px content width. |
| `--header-h` | 5rem fixed navbar height. |

## Effects & motion

| Token | Value |
|---|---|
| `--glow-sm/md/lg` | The signature violet glow (used instead of hard shadows). |
| `--glow-card` | Subtle card-hover glow. |
| `--shadow-sm/md/lg/2xl` | Neutral elevation shadows. |
| `--blur-glass` | 12px backdrop blur for glass surfaces. |
| `--ease-out` / `--ease-in-out` | Easing curves (calm, no bounce). |
| `--dur-fast/dur/dur-slow` | 150ms / 200ms / 300ms. |

## Density tokens

Set `data-density` on an ancestor to switch these (see
**[Theming](/getting-started/theming)**):

| Token | Comfortable | Cozy | Compact |
|---|---|---|---|
| `--ds-control-h` | 2.75rem | 2.5rem | 2.25rem |
| `--ds-control-px` | 1rem | 0.875rem | 0.75rem |

## Using tokens in your own CSS

You can reference any token in your application's CSS — your custom code will then
match the design system automatically and re-theme along with it:

```css
.my-custom-banner {
    background: var(--surface-card);
    border: 1px solid var(--border);
    border-radius: var(--radius-2xl);
    color: var(--foreground);
    box-shadow: var(--glow-card);
}
```
