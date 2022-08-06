<?php

namespace AlazziAz\Tamara;

use AlazziAz\Tamara\Tamara\Client;
use AlazziAz\Tamara\Tamara\Notification\NotificationService;

class Tamara
{
    public function __construct(
        protected Client $client,
        protected NotificationService $notificationService
    ) {
    }

    public function client(): Client
    {
        return $this->client;
    }

    public function notificationService(): NotificationService
    {
        return $this->notificationService;
    }
}
