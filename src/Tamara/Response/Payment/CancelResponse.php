<?php

declare(strict_types=1);

namespace AlazziAz\Tamara\Tamara\Response\Payment;

use AlazziAz\Tamara\Tamara\Response\ClientResponse;

class CancelResponse extends ClientResponse
{
    private const
        ORDER_ID = 'order_id';

    private const
        CANCEL_ID = 'cancel_id';

    /**
     * @var string|null
     */
    private $orderId;

    /**
     * @var string|null
     */
    private $cancelId;

    public function getOrderId(): ?string
    {
        return $this->orderId;
    }

    public function getCancelId(): ?string
    {
        return $this->cancelId;
    }

    protected function parse(array $responseData): void
    {
        $this->orderId = $responseData[self::ORDER_ID];
        $this->cancelId = $responseData[self::CANCEL_ID];
    }
}
