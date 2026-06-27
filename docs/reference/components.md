---
title: "All components"
description: "A single flat reference of every Selli UI component tag and where it's documented."
---

# All components

Every tag in the library, grouped. Sub-components (with a dot) must be used inside
their parent.

## Actions

| Tag | Docs |
|---|---|
| `<x-selli::button>` | [Actions](/components/actions) |
| `<x-selli::button-group>` | [Actions](/components/actions) |
| `<x-selli::dropdown>` | [Actions](/components/actions) |
| `<x-selli::context-menu>` | [Actions](/components/actions) |
| `<x-selli::popover>` | [Actions](/components/actions) |
| `<x-selli::menu>` / `menu.item` / `menu.label` / `menu.separator` | [Actions](/components/actions) |
| `<x-selli::tabs>` / `tab-panel` | [Actions](/components/actions) |
| `<x-selli::accordion>` / `accordion.item` | [Actions](/components/actions) |

## Display & content

| Tag | Docs |
|---|---|
| `<x-selli::card>` / `card.icon` / `card.title` / `card.body` | [Display](/components/display) |
| `<x-selli::stat>` | [Display](/components/display) |
| `<x-selli::eyebrow>` | [Display](/components/display) |
| `<x-selli::section-heading>` | [Display](/components/display) |
| `<x-selli::avatar>` / `avatar-group` | [Display](/components/display) |
| `<x-selli::brand>` | [Display](/components/display) |
| `<x-selli::badge>` | [Display](/components/display) |
| `<x-selli::separator>` | [Display](/components/display) |
| `<x-selli::heading>` / `<x-selli::text>` | [Typography](/foundations/typography) |
| `<x-selli::icon>` | [Icons](/foundations/icons) |

## Forms

| Tag | Docs |
|---|---|
| `<x-selli::field>` | [Forms](/components/forms) |
| `<x-selli::input>` / `<x-selli::textarea>` | [Forms](/components/forms) |
| `<x-selli::checkbox>` / `<x-selli::radio>` / `<x-selli::switch>` | [Forms](/components/forms) |
| `<x-selli::checkbox-group>` / `<x-selli::radio-group>` | [Forms](/components/forms) |
| `<x-selli::select>` | [Forms](/components/forms) |
| `<x-selli::autocomplete>` / `<x-selli::editor>` | [Forms](/components/forms) |

## Data display

| Tag | Docs |
|---|---|
| `<x-selli::table>` | [Data](/components/data) |
| `<x-selli::chart>` / `<x-selli::sparkline>` / `<x-selli::donut>` | [Data](/components/data) |
| `<x-selli::calendar>` / `<x-selli::datepicker>` | [Data](/components/data) |

## Feedback

| Tag | Docs |
|---|---|
| `<x-selli::callout>` | [Feedback](/components/feedback) |
| `<x-selli::tooltip>` | [Feedback](/components/feedback) |
| `<x-selli::spinner>` / `<x-selli::progress>` / `<x-selli::skeleton>` | [Feedback](/components/feedback) |
| `<x-selli::dot>` / `<x-selli::kbd>` | [Feedback](/components/feedback) |

## Navigation

| Tag | Docs |
|---|---|
| `<x-selli::navbar>` | [Navigation](/components/navigation) |
| `<x-selli::navlist>` / `navlist.item` / `navlist.label` | [Navigation](/components/navigation) |
| `<x-selli::breadcrumbs>` | [Navigation](/components/navigation) |
| `<x-selli::pagination>` | [Navigation](/components/navigation) |
| `<x-selli::command>` | [Navigation](/components/navigation) |

## Overlays

| Tag | Docs |
|---|---|
| `<x-selli::modal>` | [Overlays](/components/overlays) |
| `<x-selli::toast-host>` | [Overlays](/components/overlays) |

## Layout

| Tag | Docs |
|---|---|
| `<x-selli::app-shell>` | [Layout](/components/layout) |
| `<x-selli::panel>` | [Layout](/components/layout) |
| `<x-selli::stat-card>` | [Layout](/components/layout) |
| `<x-selli::page-head>` | [Layout](/components/layout) |
| `<x-selli::empty-state>` | [Layout](/components/layout) |
| `<x-selli::theme-toggle>` | [Layout](/components/layout) |

::: callout info "PHP API"
The package also exposes `\Selli\Ui\Facades\SelliUi` (`::css()`, `::js()`,
`::colors()`) and `\Selli\Ui\Icons` (`::names()`, `::has()`, `::path()`).
:::
