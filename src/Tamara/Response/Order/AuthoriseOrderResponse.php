<?php

declare(strict_types=1);

namespace AlazziAz\Tamara\Tamara\Response\Order;

use AlazziAz\Tamara\Tamara\Response\ClientResponse;
use DateTimeImmutable;

class AuthoriseOrderResponse extends ClientResponse
{
    private const
        ORDER_ID = 'order_id';

    private const
        STATUS = 'status';

    private const
        ORDER_EXPIRY_TIME = 'order_expiry_time';

    /**
     * @var string|null
     */
    private $orderId;

    /**
     * @var string|null
     */
    private $orderStatus;

    /**
     * @var DateTimeImmutable
     */
    private $orderExpiryTime;

    public function getOrderId(): ?string
    {
        return $this->orderId;
    }

    public function getOrderStatus(): ?string
    {
        return $this->orderStatus;
    }

    public function getOrderExpiryTime(): DateTimeImmutable
    {
        return $this->orderExpiryTime;
    }

    protected function parse(array $responseData): void
    {
        $this->orderId = $responseData[self::ORDER_ID];
        $this->orderStatus = $responseData[self::STATUS];
        $this->orderExpiryTime = new DateTimeImmutable($responseData[self::ORDER_EXPIRY_TIME]);
    }
}
