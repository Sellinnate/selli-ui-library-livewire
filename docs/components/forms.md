---
title: "Forms & inputs"
description: "field, input, textarea, checkbox, radio, switch, checkbox-group, radio-group, select, autocomplete and editor — all wire:model ready."
---

# Forms & inputs

![Controlli form Selli UI](/assets/components/form.png)

Every control forwards extra attributes (including `wire:model`, `name`, `value`,
`id`) to the underlying native element. See **[Using with
Livewire](/getting-started/livewire)**.

## Field

A wrapper that adds a label, description, required marker and error/hint text
around any control.

```blade
<x-selli::field label="Email" for="email" description="Non la condivideremo." :error="$errors->first('email')">
    <x-selli::input id="email" type="email" wire:model="email" :invalid="$errors->has('email')" />
</x-selli::field>
```

| Prop | Description |
|---|---|
| `label` | The field label. |
| `for` | `id` of the control (links the label). |
| `description` | Helper text under the label. |
| `error` | Error message (shown in red, replaces the hint). |
| `hint` | Subtle hint (hidden when there's an error). |
| `required` | Adds a red asterisk. |

## Input

```blade
<x-selli::input placeholder="Cerca…" icon="search" :clearable="true" />
<x-selli::input type="email" trailing="@selli.io" />
<x-selli::input size="lg" :invalid="true" />
```

| Prop | Default | Description |
|---|---|---|
| `type` | `text` | Any HTML input type. |
| `icon` | — | Leading icon. |
| `trailing` | — | Trailing text/markup. |
| `size` | `md` | `sm`, `md`, `lg`. |
| `invalid` | `false` | Red border + `aria-invalid`. |
| `clearable` | `false` | Adds a clear (×) button. |

## Textarea

```blade
<x-selli::textarea rows="5" wire:model="bio" placeholder="Raccontaci di te…" />
```

Props: `rows`, `invalid`.

## Checkbox, radio, switch

```blade
<x-selli::checkbox label="Accetto i termini" description="Leggi prima il contratto." value="1" wire:model="agree" />
<x-selli::radio name="plan" value="pro" label="Pro" />
<x-selli::switch label="Notifiche email" wire:model.live="notify" />
```

All three accept a `label` (and checkbox/radio accept `description`). The native
`<input>` receives your `wire:model`, `name`, `value` and `checked`.

## Checkbox group & radio group

Group related controls with a shared label and optional horizontal layout.

```blade
<x-selli::radio-group label="Piano" :horizontal="true">
    <x-selli::radio name="plan" value="free" label="Free" />
    <x-selli::radio name="plan" value="pro" label="Pro" />
</x-selli::radio-group>
```

Props: `label`, `horizontal`.

## Select

A styled native `<select>`. Pass an `options` array (or slot your own `<option>`s).

```blade
<x-selli::select
    wire:model="plan"
    placeholder="Scegli un piano"
    :selected="$plan"
    :options="['free' => 'Free', 'pro' => 'Pro', 'enterprise' => 'Enterprise']"
/>
```

| Prop | Description |
|---|---|
| `options` | `value => label` map (or list). |
| `placeholder` | Disabled first option. |
| `selected` | The currently selected value. |
| `invalid` | Red border. |

## Autocomplete

A searchable combobox (Alpine). Filters a list as you type; writes the chosen
value to a hidden field named `name`.

```blade
<x-selli::autocomplete
    name="city"
    placeholder="Città"
    :options="['Milano', 'Roma', 'Napoli', 'Torino']"
/>
```

| Prop | Description |
|---|---|
| `options` | List of strings, or `['value'=>…, 'label'=>…]` maps. |
| `name` | Name of the hidden field that holds the value. |
| `value` | Pre-selected value. |
| `placeholder` / `empty` | Input placeholder / no-results text. |

## Editor

A lightweight rich-text editor (bold / italic / underline / list) backed by a
hidden field for form submission.

```blade
<x-selli::editor name="content" value="<p>Ciao</p>" placeholder="Scrivi qui…" />
```

Props: `name`, `value` (initial HTML), `placeholder`.

::: callout info "Editor & Livewire"
The editor writes its HTML into a hidden `<input>` and fires an `input` event on
every change, so `wire:model` on that hidden field stays in sync. For the simplest
binding, give the hidden field a `name` and read it on submit.
:::
