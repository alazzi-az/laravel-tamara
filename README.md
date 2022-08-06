
[<img src="https://github-ads.s3.eu-central-1.amazonaws.com/support-ukraine.svg?t=1" />](https://supportukrainenow.org)

# Laravel wrapper for [Tamara SDK](https://github.com/tamara-solution/php-sdk)

[![Latest Version on Packagist](https://img.shields.io/packagist/v/alazzi-az/laravel-tamara.svg?style=flat-square)](https://packagist.org/packages/alazzi-az/laravel-tamara)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/alazzi-az/laravel-tamara/run-tests?label=tests)](https://github.com/alazzi-az/laravel-tamara/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/workflow/status/alazzi-az/laravel-tamara/Fix%20PHP%20code%20style%20issues?label=code%20style)](https://github.com/alazzi-az/laravel-tamara/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/alazzi-az/laravel-tamara.svg?style=flat-square)](https://packagist.org/packages/alazzi-az/laravel-tamara)

Laravel wrapper for Tamara SDK with small amount of changes to make it work with Laravel 9.x.




## Installation

You can install the package via composer:

```bash
composer require alazzi-az/laravel-tamara
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="laravel-tamara-config"
```

This is the contents of the published config file:

```php
return [
    'uri' => env('TAMARA_URI', 'https://api-sandbox.tamara.co'),
    'token' => env('TAMARA_TOKEN'),
    'notification_token' => env('TAMARA_NOTIFICATION_TOKEN'),
    'request_timeout' => env('TAMARA_REQUEST_TIMEOUT', 10),
    'transport' => null,
    'success_url'=>'',
    'failure_url'=>'',
    'cancel_url'=>'',
    'notification_url'=>'',
];
```


## Usage For Client Instance

```php
use \AlazziAz\Tamara\Facades\Tamara;

$client = \AlazziAz\Tamara\Facades\Tamara::client();
$response = $client->getPaymentTypes('SA');
```

## Usage For Notification Service Instance

```php
use \AlazziAz\Tamara\Facades\Tamara;

$notificationService = Tamara::notificationService();
$message = $notificationService->processAuthoriseNotification();
```
## Usage Some  Instance by Laravel Container

```php
use Illuminate\Support\Facades\App;
use AlazziAz\Tamara\Tamara\Model\Order\MerchantUrl;

$merchantUrl = App::make(MerchantUrl::class);
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](https://github.com/alazzi-az/.github/blob/main/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Mohammed Ali Azman](https://github.com/alazzi-az)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
