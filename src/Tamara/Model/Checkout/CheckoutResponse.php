<?php

declare(strict_types=1);

namespace AlazziAz\Tamara\Tamara\Model\Checkout;

class CheckoutResponse
{
    public const
        ORDER_ID = 'order_id';

    public const
        CHECKOUT_ID = 'checkout_id';

    public const
        CHECKOUT_URL = 'checkout_url';

    private $orderId;

    private $checkoutUrl;

    private $checkoutId;

    public function __construct(array $response)
    {
        $this->orderId = $response[self::ORDER_ID];
        $this->checkoutUrl = $response[self::CHECKOUT_URL];
        $this->checkoutId = $response[self::CHECKOUT_ID];
    }

    public function getOrderId(): string
    {
        return $this->orderId;
    }

    public function getCheckoutUrl(): string
    {
        return $this->checkoutUrl;
    }

    public function getCheckoutId()
    {
        return $this->checkoutId;
    }

    public function toArray(): array
    {
        return [
            self::ORDER_ID => $this->getOrderId(),
            self::CHECKOUT_URL => $this->getCheckoutUrl(),
            self::CHECKOUT_ID => $this->getCheckoutId(),
        ];
    }
}
