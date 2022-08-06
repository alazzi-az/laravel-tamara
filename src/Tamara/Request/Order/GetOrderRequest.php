<?php

declare(strict_types=1);

namespace AlazziAz\Tamara\Tamara\Request\Order;

class GetOrderRequest
{
    /**
     * @var string Tamara order id
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
