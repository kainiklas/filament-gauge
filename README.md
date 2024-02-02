# Filament Gauge

[![Latest Version on Packagist](https://img.shields.io/packagist/v/kainiklas/filament-gauge.svg?style=flat-square)](https://packagist.org/packages/kainiklas/filament-gauge)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/kainiklas/filament-gauge/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/kainiklas/filament-gauge/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/kainiklas/filament-gauge/fix-php-code-styling.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/kainiklas/filament-gauge/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/kainiklas/filament-gauge.svg?style=flat-square)](https://packagist.org/packages/kainiklas/filament-gauge)

![Filament Gauge](https://raw.githubusercontent.com/kainiklas/filament-gauge/main/art/filament-gauge.jpg)

SVG gauge for filament.

## Installation

You can install the package via composer:

```bash
composer require kainiklas/filament-gauge
```

Optionally, you can publish the views using

```bash
php artisan vendor:publish --tag="filament-gauge-views"
```

## Usage

You can render any numeric value between `0` and `100`. The value is rounded. If the value is outside these ranges, you can normalize it with the `upperBound()` method, e.g., values between `0` and `1` need to be bounded by `upperBound(1)` and values between `0` and `50` need to be bounded by `upperBound(50)`.

```php
use Kainiklas\FilamentGauge\Enums\GaugeSize;
use Kainiklas\FilamentGauge\Tables\Columns\Gauge;

InlineGauge::make('number')
    // circle size (SM, MD, XL)
    // default: SM
    ->size(Size::MD) 

    // hides the number in the middle of the circle
    ->valueHidden() 

    // set an upper bound to calculate correct percentages
    // this should be the highest possible value
    // default: 100, which means values between 0 and 100
    // example: values between 0 and 1 -> set it to 1
    ->upperBound(1) 
```

## Customize Style

You can customize the style of the component with the following css hook classes:

```css
/* arc, representing the value */
.fi-inline-gauge-section-color {
    @apply text-primary-600
}
```

```css
/* full circle (the background) */
.fi-inline-gauge-shape-color {
    @apply text-gray-300 dark:text-gray-700
}
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Kai](https://github.com/kainiklas)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
