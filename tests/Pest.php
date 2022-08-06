<?php

use AlazziAz\Tamara\Tests\TestCase;

uses(TestCase::class)->in(__DIR__);
it('should be able to call client instance', function () {
    $client = \AlazziAz\Tamara\Facades\Tamara::client();

    $response = $client->getPaymentTypes('SA');

    if ($response->isSuccess()) {
        var_dump($response->getPaymentTypes());
    }
    $this->assertInstanceOf(\AlazziAz\Tamara\Tamara\Client::class, $client);
});

it('should be able to call Notification instance', function () {
    $notificationService = \AlazziAz\Tamara\Facades\Tamara::notificationService();
    $message = $notificationService->processAuthoriseNotification();

    var_dump($message->getOrderId());
    var_dump($message->getOrderStatus());
    var_dump($message->getData());
    $this->assertInstanceOf(\AlazziAz\Tamara\Tamara\Notification\NotificationService::class, $notificationService);
});
