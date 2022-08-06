<?php

declare(strict_types=1);

namespace AlazziAz\Tamara\Tamara\Response\Payment;

use AlazziAz\Tamara\Tamara\Model\Order\Order;
use AlazziAz\Tamara\Tamara\Model\Payment\Capture;
use AlazziAz\Tamara\Tamara\Model\Payment\Refund;
use AlazziAz\Tamara\Tamara\Response\ClientResponse;

class RefundResponse extends ClientResponse
{
    /**
     * @var string
     */
    private $orderId;

    /**
     * @var RefundItemResponse[]
     */
    private $refunds;

    public function getOrderId(): ?string
    {
        return $this->orderId;
    }

    /**
     * @return RefundItemResponse[]
     */
    public function getRefunds(): array
    {
        return $this->refunds;
    }

    protected function parse(array $responseData): void
    {
        $this->orderId = $responseData[Order::ORDER_ID];
        $this->toRefunds($responseData[Refund::REFUND_COLLECTION]);
    }

    private function toRefunds(array $refunds): void
    {
        foreach ($refunds as $refund) {
            $this->refunds[] = new RefundItemResponse($refund[Capture::CAPTURE_ID], $refund[Refund::REFUND_ID]);
        }
    }
}
