---
title: "Installation"
description: "Install Selli UI in a Laravel app, publish the stylesheet, link it in your layout, and render your first component."
---

# Installation

This takes about five minutes. By the end you'll have a working `x-selli::button`
on screen.

## Requirements

| Requirement | Version | Why |
|---|---|---|
| PHP | **8.3+** | The package uses modern PHP features. |
| Laravel | **11 or 12** | For package auto-discovery and Blade components. |
| Livewire | **4** *(optional)* | Only needed for the interactive components that use `wire:model`. The rest work without it. |

## Step 1 — Install via Composer

```bash
composer require selli/ui
```

Laravel's **package discovery** registers the service provider automatically —
there is nothing to add to `config/app.php`.

## Step 2 — Publish the assets

The package ships a stylesheet (the design tokens + component styles) and a small
JavaScript helper file. Copy them into your app's `public/` folder:

```bash
php artisan vendor:publish --tag="selli-ui-assets"
```

This creates:

| File | What it is |
|---|---|
| `public/vendor/selli-ui/css/selli-ui.css` | The complete stylesheet (tokens + components). |
| `public/vendor/selli-ui/js/selli-ui.js` | Alpine helpers for the interactive components. |

::: callout info "Optional: publish the config"
If you want to change defaults (default theme, brand colour presets, density),
publish the config file too:

```bash
php artisan vendor:publish --tag="selli-ui-config"
```

That creates `config/selli-ui.php`. See **[Theming](/getting-started/theming)**.
:::

## Step 3 — Link the stylesheet in your layout

Open your main layout (usually `resources/views/components/layout.blade.php` or
`resources/views/layouts/app.blade.php`) and add the stylesheet to the `<head>`.
There's a facade helper that returns the published URL:

```blade
<!doctype html>
<html lang="it" class="dark">  {{-- dark-first; remove "dark" / add "light" for light mode --}}
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- Selli UI stylesheet --}}
    <link rel="stylesheet" href="{{ \Selli\Ui\Facades\SelliUi::css() }}">
</head>
<body>
    {{ $slot }}

    {{-- Alpine (Livewire already includes it). If you are NOT using Livewire,
         add Alpine yourself, then the Selli helpers: --}}
    <script src="{{ \Selli\Ui\Facades\SelliUi::js() }}" defer></script>
</body>
</html>
```

::: callout warning "Order matters for the JavaScript"
`selli-ui.js` registers Alpine components on the `alpine:init` event, so it must
load **before** Alpine starts. With Livewire, just include `@livewireScripts` and
then `selli-ui.js`. Without Livewire, load Alpine, then `selli-ui.js`.
:::

## Step 4 — Render your first component

Put this anywhere in a Blade view rendered inside that layout:

```blade
<x-selli::button icon="rocket">Funziona!</x-selli::button>
```

Refresh the page — you should see a violet, glowing button. 🎉

## Troubleshooting

::: callout danger "The button has no styling"
The stylesheet isn't loading. Check that you ran `vendor:publish` and that the
`<link>` URL resolves (open it directly in the browser). After publishing assets,
they live in `public/vendor/selli-ui/` — re-run the publish command with
`--force` after package updates.
:::

::: callout danger "Dropdowns / modals don't open"
Those need Alpine. Make sure Alpine is on the page and `selli-ui.js` loads after
it. In a Livewire app this is automatic once `@livewireScripts` is present.
:::

Next: build a real page in the **[Quickstart](/getting-started/quickstart)**.
