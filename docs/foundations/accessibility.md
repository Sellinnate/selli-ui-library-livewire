---
title: "Accessibility"
description: "How Selli UI supports keyboard users and assistive technology — the ARIA, focus and motion guarantees built into every component."
---

# Accessibility

Selli UI is built to be usable with a keyboard and a screen reader out of the box.
This page summarises what the library guarantees and the few things that remain
**your** responsibility.

## What the components do for you

### Keyboard operation
- **Dropdown / context-menu / popover** — open with the trigger (Enter/Space),
  `↓`/`↑` move focus through `role="menuitem"`s, **Esc** closes and returns focus
  to the trigger. The trigger exposes `aria-haspopup`, `aria-expanded` and
  `aria-controls`.
- **Modal** — focus moves into the dialog on open, **Tab/Shift+Tab are trapped**
  inside it, **Esc** closes, and focus returns to the element that opened it. The
  dialog is named via `aria-labelledby` (its title) or a fallback `aria-label`.
- **Tabs** — `role="tablist"/tab/tabpanel` with `aria-controls`, **roving
  tabindex** (one tab stop) and `←`/`→`/`Home`/`End` to move between tabs.
- **Command palette** — opens on **⌘K / Ctrl-K**, is a labelled `role="dialog"`
  with a `combobox` input over a `listbox`, and `aria-activedescendant` tracks the
  highlighted item.
- **Accordion** — native `<details>`, so it works even without JavaScript.

### Names, roles & states
- **Switch** exposes `role="switch"` + `aria-checked`.
- **Autocomplete** is a full `combobox` → `listbox`/`option` with
  `aria-activedescendant`.
- **Field** renders errors as `role="alert"`; inputs/selects/textareas accept
  `describedby` (→ `aria-describedby`) and set `aria-invalid` when `:invalid`.
- **Table** headers use `scope="col"` and accept a visually-hidden `caption`.
- **Calendar** days carry a full-date `aria-label` (e.g. "14 Febbraio 2027, oggi").
- **Avatar** status dots have a screen-reader text equivalent.
- **Tooltip** links its bubble to the trigger via `aria-describedby`.
- **Toasts** announce politely (`role="status"`) — or assertively
  (`role="alert"`) for `danger`/`warning`.
- **Icons** are `aria-hidden` by default; pass `title` to make one meaningful.

### Focus & motion
- A consistent, visible **`:focus-visible`** ring is applied to every interactive
  component (and never removed without a replacement).
- All infinite animations are disabled under **`prefers-reduced-motion`**.
- A **`.selli-sr-only`** utility is available for your own visually-hidden text.

## What you still need to do

::: callout warning "Three things only you can provide"
1. **Name your icon-only buttons.** `<x-selli::button icon="trash-2" />` has no
   text — add `aria-label="Elimina"`.
2. **Associate labels with controls.** Give the control an `id` and the
   `<x-selli::field>` a matching `for` (or use the wrapping `<x-selli::checkbox
   label="…">` style, which associates implicitly).
3. **Link hints/errors** to a control with `describedby` when you need the
   relationship announced: `<x-selli::input describedby="email-hint" />`.
:::

## Testing

Accessibility is covered by the test suite: ARIA/markup guarantees in Pest
(`tests/Feature/A11y`) and real keyboard behaviour (focus trap, menu navigation,
arrow-key tabs) in Playwright (`playwright/tests/keyboard.spec.ts`).

::: callout info "Colour contrast"
The default dark palette and all six themes aim for WCAG AA on body text. Light
themes (amber, cyan, emerald) ship a dark `--primary-foreground` so text on the
accent colour stays readable. If you set a custom `--primary`, check the contrast
of text placed on it.
:::
