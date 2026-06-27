---
title: "Colors"
description: "The Selli colour system: the Electric Violet brand ramp, the violet-tinted neutral ink scale, semantic colours and the shadcn-style aliases."
---

# Colors

The palette is defined in `resources/css/tokens/colors.css` using the modern
`oklch()` colour space (perceptually even lightness). It is **dark-first**: the
dark values live on `:root`, and `.light` inverts the surface tokens.

## Brand — Electric Violet

The signature colour. `--violet-500` is the primary.

| Token | Use |
|---|---|
| `--violet-50` … `--violet-900` | The full brand ramp. |
| `--violet-500` | **Primary** — ≈ `#a855f7`. |
| `--violet-600` | Primary hover. |
| `--brand-glow` | `rgba(168,85,247,0.45)` for halos. |

## Accent — Blue

Used for the secondary "blue" variants (e.g. the `blue` button, blue badge).

| Token | Use |
|---|---|
| `--blue-400/500/600` | Blue accent ramp. |

## Neutral ink (violet-tinted)

The greys carry a subtle violet tint so they sit naturally next to the brand.

| Token | Use |
|---|---|
| `--ink-0` | Deepest background. |
| `--ink-1` | Card surface. |
| `--ink-2` | Muted surface. |
| `--ink-7` | Muted text. |
| `--ink-9` | Near-white text. |

## Semantic

| Token | Meaning |
|---|---|
| `--success` | Positive / confirmed (green). |
| `--warning` | Caution (amber). |
| `--danger` | Destructive / error (red). |

## Semantic aliases (what components actually use)

These shadcn-compatible aliases are what components reference. They map to the
ramps above and flip under `.light`.

| Token | Role |
|---|---|
| `--primary` / `--primary-foreground` | Accent + text on accent. |
| `--background` / `--foreground` | Page bg + text. |
| `--card` / `--card-foreground` | Card surface + text. |
| `--popover` / `--popover-foreground` | Floating surfaces. |
| `--secondary` / `--muted` / `--accent` | Supporting surfaces. |
| `--muted-foreground` | Secondary text. |
| `--border` / `--border-strong` / `--input` | Lines & control borders. |
| `--ring` | Focus ring colour. |
| `--surface-card` / `--surface-raised` | Glass fills. |

::: callout tip "Re-colour everything by changing one token"
Set `--primary` to any colour and the whole library follows. See
**[Theming](/getting-started/theming)**.
:::
