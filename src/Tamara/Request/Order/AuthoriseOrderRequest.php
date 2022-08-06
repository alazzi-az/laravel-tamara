<?php

declare(strict_types=1);

namespace AlazziAz\Tamara\Tamara\Request\Order;

class AuthoriseOrderRequest
{
    /**
     * @var string
     */
    private $orderId;

    public function __construct(string $orderId)
    {
        $this->orderId = $orderId;
    }

    public function getOrderId(): string
    {
        return $this->orderId;
    }
}
