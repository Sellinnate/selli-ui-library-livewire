---
title: "Display & content"
description: "Card, stat, eyebrow, section-heading, avatar, avatar-group, brand, badge and separator."
---

# Display & content

## Card

![Card](/assets/components/card.png)

A glass surface with a hairline border. On hover the border turns violet and a
soft glow blooms. Compose it with the `card.*` sub-components.

```blade
<x-selli::card>
    <x-selli::card.icon name="sparkles" />
    <x-selli::card.title>Titolo</x-selli::card.title>
    <x-selli::card.body>Una breve descrizione della funzionalità.</x-selli::card.body>
</x-selli::card>
```

| Prop | Default | Description |
|---|---|---|
| `hoverable` | `true` | Lights up on hover. |
| `glow` | `false` | Force the lit state always. |
| `accent` | `violet` | `violet` or `blue` glow. |

Sub-components: `card.icon` (`name`, `color`), `card.title` (`as`),
`card.body` (`as`).

## Stat

A big-number stat block (the "98% / 60+ / 100%" homepage grid).

```blade
<x-selli::stat value="98%" label="Uptime">Affidabilità garantita.</x-selli::stat>
```

| Prop | Description |
|---|---|
| `value` | The big number. |
| `label` | A heading under it. |
| *(slot)* | Optional supporting text. |

## Eyebrow

The small glass capsule with a live pulse dot that sits above headings.

```blade
<x-selli::eyebrow>Novità</x-selli::eyebrow>
<x-selli::eyebrow :pulse="false">Statico</x-selli::eyebrow>
```

| Prop | Default | Description |
|---|---|---|
| `pulse` | `true` | Show the animated dot. |

## Section heading

![Section heading](/assets/components/section-heading.png)

The eyebrow + title (with optional violet accent word) + lead paragraph block.

```blade
<x-selli::section-heading
    eyebrow="Selli UI"
    title="Componenti"
    accent="enterprise"
    lead="Tutto ciò che serve per costruire interfacce coerenti."
    align="center"
/>
```

| Prop | Default | Description |
|---|---|---|
| `eyebrow` | — | Eyebrow text. |
| `eyebrowPulse` | `true` | Pulse dot on the eyebrow. |
| `title` | — | The main heading. |
| `accent` | — | A trailing word shown in the brand colour. |
| `lead` | — | Supporting paragraph. |
| `align` | `left` | `left` or `center`. |

## Avatar & avatar group

![Avatar](/assets/components/avatar.png)

```blade
<x-selli::avatar name="Filippo Calabrese" size="lg" status="online" />
<x-selli::avatar src="/me.jpg" name="Me" />

<x-selli::avatar-group :extra="3">
    <x-selli::avatar name="A B" />
    <x-selli::avatar name="C D" />
</x-selli::avatar-group>
```

**avatar** props: `src`, `name` (initials fallback), `size`
(`xs`/`sm`/`md`/`lg`/`xl`), `status` (`online`/`busy`/`away`/`offline`),
`square`, `ring`.
**avatar-group** props: `max`, `extra` (the "+N" overflow count).

## Brand

The Selli logomark + wordmark lockup.

```blade
<x-selli::brand />
<x-selli::brand size="lg" text="Selli" />
<x-selli::brand :show-text="false" />
```

Props: `size` (`sm`/`md`/`lg`), `showText`, `text`.

## Badge

![Badge](/assets/components/badge.png)

A small status pill.

```blade
<x-selli::badge tone="success" icon="circle-check">Attivo</x-selli::badge>
<x-selli::badge tone="outline" :dashed="true">Bozza</x-selli::badge>
```

| Prop | Default | Description |
|---|---|---|
| `tone` | `violet` | `violet`, `blue`, `neutral`, `success`, `warning`, `danger`, `outline`. |
| `icon` | — | Leading icon. |
| `dashed` | `false` | Dashed border. |

## Separator

A divider — horizontal, vertical, or with a centered label.

```blade
<x-selli::separator />
<x-selli::separator label="oppure" />
<x-selli::separator :vertical="true" />
```

Props: `vertical`, `label`.
