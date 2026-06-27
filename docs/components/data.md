---
title: "Data display"
description: "table, chart, sparkline, donut, calendar and datepicker."
---

# Data display

## Table

![Tabella](/assets/components/table.png)

Render straight from PHP arrays, or compose your own rows in the slot.

### Data mode

```blade
<x-selli::table
    :columns="[
        ['key' => 'name', 'label' => 'Cliente'],
        ['key' => 'mrr', 'label' => 'MRR', 'numeric' => true],
    ]"
    :rows="$clients"
    :striped="true"
/>
```

| Prop | Default | Description |
|---|---|---|
| `columns` | — | Column defs: `['key'=>, 'label'=>, 'numeric'=>bool]` (or `key => label`). |
| `rows` | — | Array of associative rows (keys match column `key`). |
| `hover` | `true` | Row hover highlight. |
| `striped` | `false` | Zebra striping. |
| `empty` | "Nessun dato disponibile" | Empty-state text. |

`numeric` columns are right-aligned with tabular figures.

### Slot mode

```blade
<x-selli::table>
    <thead><tr><th>Nome</th><th>Stato</th></tr></thead>
    <tbody><tr><td>Acme</td><td>Attivo</td></tr></tbody>
</x-selli::table>
```

## Chart

![Grafico a barre](/assets/components/chart-bar.png)

![Grafico a linee](/assets/components/chart-line.png)

A pure-SVG bar or line chart (no JavaScript). Pass data as `label => value` or a
list of `['label'=>, 'value'=>]`.

```blade
<x-selli::chart type="bar" :data="['Gen' => 12, 'Feb' => 18, 'Mar' => 9]" />

<x-selli::chart type="line" :height="240" :data="[
    ['label' => 'Gen', 'value' => 32],
    ['label' => 'Feb', 'value' => 41],
]" />
```

| Prop | Default | Description |
|---|---|---|
| `type` | `bar` | `bar` or `line`. |
| `data` | `[]` | The data points. |
| `height` | `220` | Chart height (px). |
| `color` | `var(--primary)` | Bar/line colour. |

## Sparkline

![Sparkline](/assets/components/sparkline.png)

A tiny inline trend line — ideal inside stat cards.

```blade
<x-selli::sparkline :data="[3, 7, 4, 9, 6, 11]" />
```

Props: `data`, `width`, `height`, `area` (fill under the line).

## Donut

![Donut](/assets/components/donut.png)

A single-value progress ring with a centered percentage.

```blade
<x-selli::donut :value="72" label="del target" :size="160" />
```

Props: `value` (0–100), `size`, `thickness`, `label`, `color`.

## Calendar

![Calendario](/assets/components/calendar.png)

A server-rendered month grid (Italian labels) with today, selected day and event
dots. No JavaScript — navigation uses links you provide.

```blade
<x-selli::calendar
    :month="2" :year="2027"
    selected="2027-02-14"
    :events="['2027-02-10', '2027-02-20']"
    prev-url="?m=1" next-url="?m=3"
/>
```

| Prop | Description |
|---|---|
| `month` / `year` | The month to show (defaults to today). |
| `selected` | A `Y-m-d` date to highlight. |
| `events` | Array of `Y-m-d` dates to dot. |
| `prevUrl` / `nextUrl` | Navigation links. |

## Datepicker

![Datepicker](/assets/components/datepicker.png)

An input with a pop-up calendar (Alpine). Picks a date into a hidden field.

```blade
<x-selli::datepicker name="due" value="2027-03-01" placeholder="Scegli una data" />
```

Props: `name`, `value` (`Y-m-d`), `placeholder`. The visible field shows
`dd/mm/yyyy`; the hidden field (named `name`) holds the ISO value for submission.
