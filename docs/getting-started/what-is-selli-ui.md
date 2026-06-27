---
title: "What is Selli UI?"
description: "A plain-language introduction to component libraries, Blade components, design tokens and how Selli UI fits into a Laravel app."
---

# What is Selli UI?

This page assumes **no prior experience**. If you already know what Blade
components and design tokens are, skip to **[Installation](/getting-started/installation)**.

## The problem it solves

When you build a web app, you write the same little pieces of interface over and
over: buttons, form fields, cards, tables, pop-up dialogs. If everyone hand-codes
them, three things go wrong:

1. They look slightly different on every page.
2. Each one needs its own CSS, which piles up and gets inconsistent.
3. Accessibility and behaviour (keyboard support, focus rings) get forgotten.

A **component library** solves this. It gives you pre-built, consistent pieces.
You assemble pages from them instead of starting from a blank file.

## What is a Blade component?

**Blade** is Laravel's templating language — the `.blade.php` files in
`resources/views`. A **Blade component** is a reusable chunk of markup you call
with an HTML-like tag. Selli UI's components all start with `x-selli::`:

```blade
<x-selli::button>Salva</x-selli::button>
```

When Laravel renders this, it expands into the full button markup with all the
right classes. You only write the short tag.

::: callout info "Anonymous components"
Selli UI uses *anonymous* Blade components — they're just `.blade.php` files, no
PHP class required. Anything extra you put on the tag (like `class="..."`,
`id="..."` or `wire:model="..."`) is passed straight through to the underlying
HTML element. This is why the components feel like normal HTML tags.
:::

## What is a design token?

A **design token** is a named value for a design decision — a colour, a font
size, a corner radius — stored as a **CSS custom property** (a variable that
starts with `--`). For example, Selli UI's accent colour is the token
`--primary`.

Every component refers to tokens instead of hard-coded values. Because of that,
changing one token re-themes the entire library. Want a blue app instead of
violet? Change `--primary`. Want light mode? Add one class to `<html>`. Nothing
gets rebuilt.

::: callout tip "Why dark-first?"
The Selli brand ships dark by default — the page background is near-black and text
is near-white. A `.light` class on `<html>` flips to the light surface. You can
offer users a toggle with the built-in
**[theme toggle](/components/layout)** component.
:::

## How the pieces fit together

```
Your Laravel app
  └── Blade view
        └── <x-selli::button>   ← a Selli UI component
              └── uses CSS tokens (--primary, --radius-full, …)
                    └── defined in the Selli UI stylesheet you published
```

You install the package, publish its stylesheet, link that stylesheet in your
layout, and start using `x-selli::*` tags. That's the whole model.

Ready? Head to **[Installation](/getting-started/installation)**.
