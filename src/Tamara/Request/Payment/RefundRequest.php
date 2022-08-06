<?php

declare(strict_types=1);

namespace AlazziAz\Tamara\Tamara\Request\Payment;

use AlazziAz\Tamara\Tamara\Model\Order\Order;
use AlazziAz\Tamara\Tamara\Model\Payment\Refund;

class RefundRequest
{
    /**
     * @var string
     */
    private $orderId;

    /**
     * @var Refund[]
     */
    private $refunds;

    public function __construct(string $orderId, array $refunds = [])
    {
        $this->orderId = $orderId;
        $this->refunds = $refunds;
    }

    public function getOrderId(): string
    {
        return $this->orderId;
    }

    public function addRefund(Refund $refund): void
    {
        $this->refunds[] = $refund;
    }

    /**
     * @return Refund[]
     */
    public function getRefunds(): array
    {
        return $this->refunds;
    }

    public function toArray(): array
    {
        $refunds = [];
        foreach ($this->getRefunds() as $refund) {
            $refunds[] = $refund->toArray();
        }

        return [
            Order::ORDER_ID => $this->getOrderId(),
            Refund::REFUND_COLLECTION => $refunds,
        ];
    }
}
