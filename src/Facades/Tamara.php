<?php

namespace AlazziAz\Tamara\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \AlazziAz\Tamara\Tamara
 *
 * @method static \AlazziAz\Tamara\Tamara\Client client()
 * @method static \AlazziAz\Tamara\Tamara\Notification\NotificationService notificationService()
 */
class Tamara extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'laravel-tamara';
    }
}
