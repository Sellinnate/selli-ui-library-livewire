---
title: "Example pages: Dashboard, CRM & Settings"
description: "Three complete pages composed entirely from Selli UI components, shipped with the package and used by the browser tests."
---

# Example pages

The package ships three complete, real-world pages under
`resources/views/examples/`. They double as documentation, as the targets of the
Playwright browser suite, and as starting points you can copy into your app.

::: callout tip "Render them yourself"
Each is a normal Blade view in the `selli` namespace. Render one from a route:

```php
Route::get('/demo/dashboard', fn () => view('selli::examples.dashboard'));
```
Or build the standalone static versions with `php playwright/render.php` (output
in `playwright/dist/`).
:::

## Dashboard

![Dashboard example](/assets/components/page-dashboard.png)

`examples/dashboard.blade.php` — an analytics home built from:

- `app-shell` with a `navlist` sidebar, a user `dropdown`, a notifications button
  that fires a `toast`, and the ⌘K `command` palette.
- A `page-head` with export / new actions.
- A 4-up `stat-card` grid (each with a `sparkline`).
- A 2-column row: a line `chart` panel and a `donut` goal panel.
- A "recent activity" `table` inside a `panel`.

It's the best single tour of the library.

## CRM

![CRM example](/assets/components/page-crm.png)

`examples/crm.blade.php` — a list/management screen:

- `page-head` with filter / add actions.
- A filter row: a `clearable` search `input` and a status `select`.
- A striped `table` of clients inside a `panel`.
- A results count and `pagination`.

## Settings

![Settings example](/assets/components/page-settings.png)

`examples/settings.blade.php` — a preferences screen:

- `tabs` (Profilo / Notifiche / Sicurezza), each in its own panel.
- The Profile tab: an `avatar` + upload `button`, and `field`-wrapped `input`s and
  a `textarea`.
- The Notifications tab: `switch` rows and an info `callout`.
- The Security tab: password `field`s and a warning `callout`.

## What to copy

These pages use the same public components documented throughout this site —
there is nothing private or special in them. Copy a page into your app's views,
swap the placeholder data for your own (or `wire:model` bindings), and you have a
working screen.

## Auth & legal pages

The ready-made guest, stacked and error layouts, rendered end to end:

| Login | Register (split) |
|---|---|
| ![Login](/assets/components/page-login.png) | ![Register](/assets/components/page-register.png) |

| Verify email | Forgot password |
|---|---|
| ![Verifica email](/assets/components/page-verify-email.png) | ![Password dimenticata](/assets/components/page-forgot-password.png) |

| Privacy policy (stacked + prose) | Error 404 |
|---|---|
| ![Privacy](/assets/components/page-privacy.png) | ![404](/assets/components/page-error-404.png) |
