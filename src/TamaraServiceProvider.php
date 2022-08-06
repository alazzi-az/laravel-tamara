<?php

namespace AlazziAz\Tamara;

use AlazziAz\Tamara\Tamara\Client;
use AlazziAz\Tamara\Tamara\Configuration;
use AlazziAz\Tamara\Tamara\Model\Order\MerchantUrl;
use AlazziAz\Tamara\Tamara\Notification\NotificationService;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class TamaraServiceProvider extends PackageServiceProvider
{
    public function registeringPackage()
    {
        $this->app->singleton('tamara', function () {
            $configuration = Configuration::create(
                config('tamara.uri'),
                config('tamara.token'),
                config('tamara.request_timeout'),
                config('tamara.transport')
            );

            return Client::create($configuration);
        });
        $this->app->singleton('tamara-notification', function () {
            return NotificationService::create(config('tamara.notification_token'));
        });

        $this->app->singleton(MerchantUrl::class, function () {
            $merchantUrl = new MerchantUrl();

            $merchantUrl->setSuccessUrl(config('tamara.success_url'));
            $merchantUrl->setFailureUrl(config('tamara.failure_url'));
            $merchantUrl->setCancelUrl(config('tamara.cancel_url'));
            $merchantUrl->setNotificationUrl(config('tamara.notification_url'));

            return $merchantUrl;
        });

        $this->app->singleton('laravel-tamara', function () {
            return new Tamara($this->app->make('tamara'), $this->app->make('tamara-notification'));
        });
    }

    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('laravel-tamara')
            ->hasConfigFile();
    }
}
