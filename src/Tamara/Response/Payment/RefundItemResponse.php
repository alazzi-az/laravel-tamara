<?php

declare(strict_types=1);

namespace AlazziAz\Tamara\Tamara\Response\Payment;

class RefundItemResponse
{
    /**
     * @var string
     */
    private $captureId;

    /**
     * @var string
     */
    private $refundId;

    public function __construct(string $captureId, string $refundId)
    {
        $this->captureId = $captureId;
        $this->refundId = $refundId;
    }

    public function getCaptureId(): string
    {
        return $this->captureId;
    }

    public function getRefundId(): string
    {
        return $this->refundId;
    }
}
