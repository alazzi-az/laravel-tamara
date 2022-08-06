<?php

declare(strict_types=1);

namespace AlazziAz\Tamara\Tamara\Request\Order;

class UpdateReferenceIdRequest
{
    public const REFERENCE_ID = 'order_reference_id';

    /**
     * @var string
     */
    private $orderId;

    /**
     * @var string
     */
    private $referenceId;

    public function __construct(string $orderId, string $referenceId)
    {
        $this->orderId = $orderId;
        $this->referenceId = $referenceId;
    }

    public function getOrderId(): string
    {
        return $this->orderId;
    }

    public function getReferenceId(): string
    {
        return $this->referenceId;
    }

    public function toArray(): array
    {
        return [
            self::REFERENCE_ID => $this->getReferenceId(),
        ];
    }
}
