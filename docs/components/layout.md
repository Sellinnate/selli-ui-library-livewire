---
title: "Layout & app shell"
description: "app-shell, panel, stat-card, page-head, empty-state, theme-toggle and the responsive grid helper."
---

# Layout & app shell

## App shell

The full application chrome: a sticky sidebar (brand + navigation + user) and a
main column with a sticky topbar and a centered, scrolling content area. It's
responsive — on mobile the sidebar becomes a slide-in drawer with a hamburger.

```blade
<x-selli::app-shell title="Dashboard">
    <x-slot:brand><x-selli::brand /></x-slot:brand>

    <x-slot:sidebar>
        <x-selli::navlist>
            <x-selli::navlist.item icon="layout-dashboard" href="/dashboard" :active="true">Dashboard</x-selli::navlist.item>
            <x-selli::navlist.item icon="settings" href="/settings">Impostazioni</x-selli::navlist.item>
        </x-selli::navlist>
    </x-slot:sidebar>

    <x-slot:user>
        <x-selli::avatar name="Filippo Calabrese" size="sm" status="online" />
    </x-slot:user>

    <x-slot:actions>
        <x-selli::button size="sm" icon="plus">Nuovo</x-selli::button>
    </x-slot:actions>

    {{-- page content --}}
    <x-selli::page-head title="Buongiorno" />
    …
</x-selli::app-shell>
```

| Prop | Default | Description |
|---|---|---|
| `title` | — | Topbar page title. |
| `search` | `true` | Show the ⌘K search button (dispatches `selli-open-command`). |

Slots: `brand`, `sidebar`, `user`, `actions`, default (content). Pair it with a
`<x-selli::command>` and `<x-selli::toast-host>` to light up search and toasts.

## Panel

A titled container card with an optional header action.

```blade
<x-selli::panel title="Vendite" sub="Ultimi 30 giorni">
    <x-slot:action><x-selli::button size="sm" variant="ghost">Esporta</x-selli::button></x-slot:action>
    …
</x-selli::panel>
```

Props: `title`, `sub`. Slots: `action`, default (body).

## Stat card

![Stat card](/assets/components/stat-card.png)

A metric tile with an icon, value, trend delta and optional sparkline.

```blade
<x-selli::stat-card icon="dollar-sign" label="Ricavi" value="€48.250" delta="+12%" :spark="[12,18,15,22,26,31]" />
```

| Prop | Default | Description |
|---|---|---|
| `icon` | `activity` | Leading icon. |
| `label` / `value` | — | The metric label and big number. |
| `delta` | — | Trend text (e.g. "+12%"). |
| `deltaDir` | `up` | `up` (green) or `down` (red). |
| `spark` | — | Array of numbers for a sparkline. |
| `accent` | `var(--primary)` | Icon/sparkline colour. |

## Page head

A page title + subtitle + actions row.

```blade
<x-selli::page-head title="Clienti" sub="42 attivi">
    <x-slot:actions><x-selli::button icon="plus">Aggiungi</x-selli::button></x-slot:actions>
</x-selli::page-head>
```

## Empty state

A friendly placeholder when there's nothing to show.

```blade
<x-selli::empty-state icon="inbox" title="Nessun messaggio" desc="La tua casella è vuota.">
    <x-slot:action><x-selli::button>Componi</x-selli::button></x-slot:action>
</x-selli::empty-state>
```

## Theme toggle & colour switcher

`theme-toggle` is a dark/light switch; `theme-switcher` is a palette dropdown for
the six colour themes. Both persist to `localStorage`. See
**[Theming](/getting-started/theming)**.

```blade
<x-selli::theme-toggle />
<x-selli::theme-switcher />
```

## The grid helper

`selli-grid` is a plain responsive grid utility (no component needed):

```blade
<div class="selli-grid selli-grid--4">…</div>   {{-- 4 cols → 2 → 1 --}}
<div class="selli-grid selli-grid--3">…</div>
<div class="selli-grid selli-grid--2">…</div>
```

`--4` and `--3` collapse to 2 columns on tablets and 1 on phones; `--2` collapses
to 1 on phones.

## Guest layout & auth card

![Auth card](/assets/components/auth-card.png)

For login / register / password / verify-email screens. `guest-layout` is a
full-screen centered wrapper with a soft brand glow; `auth-card` is the form card.

```blade
<x-selli::guest-layout>
    <x-selli::auth-card title="Bentornato" sub="Accedi al tuo account">
        <form class="selli-auth-card__body" method="POST" action="/login">
            @csrf
            <x-selli::field label="Email" for="email">
                <x-selli::input id="email" type="email" name="email" icon="mail" required />
            </x-selli::field>
            <x-selli::field label="Password" for="password">
                <x-selli::input id="password" type="password" name="password" icon="lock" required />
            </x-selli::field>
            <x-selli::button type="submit" :full="true">Accedi</x-selli::button>
        </form>
        <x-slot:footer>Non hai un account? <a href="/register">Registrati</a></x-slot:footer>
    </x-selli::auth-card>
</x-selli::guest-layout>
```

`guest-layout` with `:split="true"` adds a branded left panel (`brand`, `aside`,
`asideFooter` slots) next to the centered content — great for sign-up pages.

`auth-card` props: `title`, `sub`, `brand` (show the default logo, default `true`).
Slots: `logo` (override the brand), default (body), `footer`.

## Stacked (vertical) layout

The sidebar-less counterpart to the app shell: a top navbar, a centered content
column and an optional footer.

```blade
<x-selli::stacked-layout>
    <x-slot:navbar>
        <x-selli::navbar>
            <x-slot:start><x-selli::brand /></x-slot:start>
            <x-slot:end><x-selli::button size="sm">Accedi</x-selli::button></x-slot:end>
        </x-selli::navbar>
    </x-slot:navbar>

    <h1>Contenuto della pagina</h1>

    <x-slot:footer>© 2026 Sellinnate</x-slot:footer>
</x-selli::stacked-layout>
```

## Error page

A centered error screen with a big gradient code.

```blade
<x-selli::error-page code="404" title="Pagina non trovata" desc="L'indirizzo non esiste.">
    <x-slot:actions><x-selli::button href="/" icon="home">Torna alla home</x-selli::button></x-slot:actions>
</x-selli::error-page>
```

Props: `code`, `title`, `desc`. Slots: `actions`, default.

## Prose (legal / policy content)

A readable column that styles plain HTML headings, paragraphs, lists and links —
ideal for privacy policies, terms and documentation.

```blade
<x-selli::prose title="Privacy Policy" meta="Ultimo aggiornamento: 1 giugno 2026">
    <h2>1. Titolare del trattamento</h2>
    <p>…</p>
    <ul><li>…</li></ul>
</x-selli::prose>
```

Props: `title`, `meta`. Everything else is your own markup.

::: callout tip "See them assembled"
The package ships ready-to-copy example pages: `login`, `register`,
`forgot-password`, `verify-email`, `privacy` and `error-404` under
`resources/views/examples/`.
:::
