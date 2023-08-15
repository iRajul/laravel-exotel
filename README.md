# Laravel package to interact with exotel APIs (unofficial)

[![Latest Version on Packagist](https://img.shields.io/packagist/v/irajul/laravel-exotel.svg?style=flat-square)](https://packagist.org/packages/irajul/laravel-exotel)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/irajul/laravel-exotel/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/irajul/laravel-exotel/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/irajul/laravel-exotel/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/irajul/laravel-exotel/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/irajul/laravel-exotel.svg?style=flat-square)](https://packagist.org/packages/irajul/laravel-exotel)

This is where your description should go. Limit it to a paragraph or two. Consider adding a small example.

## Installation

You can install the package via composer:

```bash
composer require irajul/laravel-exotel
```

You can publish and run the migrations with:

```bash
php artisan vendor:publish --tag="laravel-exotel-migrations"
php artisan migrate
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="laravel-exotel-config"
```

This is the contents of the published config file:

```php
return [
];
```

Optionally, you can publish the views using

```bash
php artisan vendor:publish --tag="laravel-exotel-views"
```

## Usage

```php
$exotel = new Irajul\Exotel();
echo $exotel->echoPhrase('Hello, Irajul!');
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Rajul](https://github.com/irajul)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
