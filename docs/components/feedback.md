---
title: "Feedback"
description: "callout, tooltip, spinner, progress, skeleton, dot and kbd."
---

# Feedback

## Callout

A highlighted message box for tips, info, warnings and errors.

```blade
<x-selli::callout variant="info" title="Lo sapevi?">
    Puoi cambiare il colore del brand con una sola variabile CSS.
</x-selli::callout>

<x-selli::callout variant="warning" title="Attenzione" :dismissible="true">
    La 2FA è disattivata.
</x-selli::callout>
```

| Prop | Default | Description |
|---|---|---|
| `variant` | `info` | `info`, `brand`, `success`, `warning`, `danger`. |
| `title` | — | Bold heading. |
| `icon` | *(per variant)* | Override the leading icon. |
| `dismissible` | `false` | Adds a close button that removes the callout. |

## Tooltip

A label that appears on hover/focus. Pure CSS.

```blade
<x-selli::tooltip label="Salva (⌘S)" placement="top">
    <x-selli::button icon="save" />
</x-selli::tooltip>
```

Props: `label`, `placement` (`top`/`bottom`/`left`/`right`).

## Spinner

An accessible loading spinner.

```blade
<x-selli::spinner />
<x-selli::spinner :size="32" color="var(--foreground)" />
```

Props: `size`, `color`, `label` (screen-reader text).

## Progress

A determinate or indeterminate progress bar.

```blade
<x-selli::progress :value="42" label="Caricamento" />
<x-selli::progress />   {{-- omit value for indeterminate --}}
```

Props: `value` (0–100, or omit for indeterminate), `size` (`sm`/`md`/`lg`),
`color`, `label`.

## Skeleton

A shimmering placeholder for content that's still loading.

```blade
<x-selli::skeleton width="100%" height="20" />
<x-selli::skeleton :circle="true" width="40" height="40" />
```

Props: `width`, `height` (numbers become px), `circle`.

## Dot

A small status dot, optionally pulsing.

```blade
<x-selli::dot color="var(--success)" :pulse="true" />
```

Props: `color`, `pulse`, `size`.

## Kbd

A keyboard-key cap.

```blade
Premi <x-selli::kbd>⌘</x-selli::kbd> + <x-selli::kbd>K</x-selli::kbd>
```
