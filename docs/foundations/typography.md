---
title: "Typography"
description: "The Instrument Sans type system, the display-led scale, and the Heading and Text components."
---

# Typography

The brand face is **Instrument Sans**, loaded from Google Fonts by the stylesheet
(`tokens/fonts.css`). It's the only family used across the brand; a monospace
stack (`--font-mono`) is reserved for code.

## The scale

A display-led scale with tight tracking on the big sizes.

| Token | Size | Typical use |
|---|---|---|
| `--text-xs` | 12px | Eyebrow labels, meta |
| `--text-sm` | 14px | UI text, captions |
| `--text-base` | 16px | Body |
| `--text-lg` | 18px | Lead paragraph |
| `--text-xl` | 20px | Card titles |
| `--text-2xl` | 24px | Sub-headings |
| `--text-4xl` | 36px | Section headings |
| `--text-5xl` | 48px | Page titles |
| `--text-7xl` | 72px | Hero |

## The `heading` component

Renders an `<h1>`–`<h6>` with the right size for its level. `level` picks the tag
**and** size; `gradient` paints the text with a subtle gradient ink.

```blade
<x-selli::heading :level="1">Titolo della pagina</x-selli::heading>
<x-selli::heading :level="2" :gradient="true">Con gradiente</x-selli::heading>
```

| Prop | Default | Description |
|---|---|---|
| `level` | `2` | 1–6 (clamped). Sets the tag and size. |
| `gradient` | `false` | Gradient text fill. |

## The `text` component

Body copy with a colour and size, as any tag.

```blade
<x-selli::text>Testo secondario, attenuato per impostazione predefinita.</x-selli::text>
<x-selli::text as="span" color="brand" size="lg" weight="600">In evidenza</x-selli::text>
```

| Prop | Default | Options |
|---|---|---|
| `as` | `p` | Any tag name. |
| `size` | `base` | Any `--text-*` step (`xs`…`7xl`). |
| `color` | `muted` | `default`, `muted`, `subtle`, `brand`, `danger`, `success`. |
| `weight` | — | A numeric font-weight (e.g. `600`). |

::: callout tip "Eyebrows and section headings"
For the little uppercase kicker above a heading, and the eyebrow + title + lead
block, use **[eyebrow and section-heading](/components/display)**.
:::
