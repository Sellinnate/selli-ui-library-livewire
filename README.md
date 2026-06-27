# Selli UI — Blade & Livewire 4 component library

[![run-tests](https://github.com/Sellinnate/selli-ui-library-livewire/actions/workflows/run-tests.yml/badge.svg)](https://github.com/Sellinnate/selli-ui-library-livewire/actions/workflows/run-tests.yml)
[![PHPStan](https://github.com/Sellinnate/selli-ui-library-livewire/actions/workflows/phpstan.yml/badge.svg)](https://github.com/Sellinnate/selli-ui-library-livewire/actions/workflows/phpstan.yml)

An enterprise-grade UI component library for Laravel, built on the **Selli Design System** — Electric Violet, Instrument Sans, dark-first, with the brand's signature violet glow. Ships as a set of `x-selli::*` Blade components designed to drop straight into any Laravel + Livewire 4 application.

> Every component is themeable through CSS custom properties (design tokens), works in light and dark mode, and ships with tests.

## Requirements

- PHP `^8.3`
- Laravel `^11.0 || ^12.0`
- Livewire `^4.0` (only required for the interactive components)

## Installation

```bash
composer require selli/ui
```

Publish the stylesheet and JavaScript assets:

```bash
php artisan vendor:publish --tag=selli-ui-assets
```

(Optionally) publish the config file:

```bash
php artisan vendor:publish --tag=selli-ui-config
```

Add the design-system stylesheet to your layout `<head>`:

```blade
<link rel="stylesheet" href="{{ \Selli\Ui\Facades\SelliUi::css() }}">
```

The system is **dark-first**. Add the `dark` appearance by leaving `<html>` as-is, or switch to the light surface with `<html class="light">`.

## Usage

All components are anonymous Blade components under the `selli` namespace:

```blade
<x-selli::button variant="primary" icon="rocket">Inizia ora</x-selli::button>

<x-selli::card>
    <x-selli::card.icon name="sparkles" />
    <x-selli::card.title>Componenti enterprise</x-selli::card.title>
    <x-selli::card.body>Pronti per la produzione, testati e documentati.</x-selli::card.body>
</x-selli::card>

<x-selli::badge tone="success" icon="circle-check">Attivo</x-selli::badge>
```

See the [documentation](https://github.com/Sellinnate/selli-ui-library-livewire) for the full component reference.

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for what has changed recently.

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
