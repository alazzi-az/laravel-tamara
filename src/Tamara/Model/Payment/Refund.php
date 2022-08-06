<?php

declare(strict_types=1);

namespace AlazziAz\Tamara\Tamara\Model\Payment;

use AlazziAz\Tamara\Tamara\Model\Money;
use AlazziAz\Tamara\Tamara\Model\Order\Order;
use AlazziAz\Tamara\Tamara\Model\Order\OrderItemCollection;

class Refund
{
    public const
        REFUND_ID = 'refund_id';

    public const
        REFUND_COLLECTION = 'refunds';

    /**
     * @var string Tamara capture id
     */
    private $captureId;

    /**
     * @var Money
     */
    private $totalAmount;

    /**
     * @var Money
     */
    private $shippingAmount;

    /**
     * @var Money
     */
    private $taxAmount;

    /**
     * @var Money
     */
    private $discountAmount;

    /**
     * @var OrderItemCollection
     */
    private $items;

    public function __construct(
        string $captureId,
        Money $totalAmount,
        Money $shippingAmount,
        Money $taxAmount,
        Money $discountAmount,
        OrderItemCollection $items
    ) {
        $this->captureId = $captureId;
        $this->totalAmount = $totalAmount;
        $this->shippingAmount = $shippingAmount;
        $this->taxAmount = $taxAmount;
        $this->discountAmount = $discountAmount;
        $this->items = $items;
    }

    public function getCaptureId(): string
    {
        return $this->captureId;
    }

    public function getTotalAmount(): Money
    {
        return $this->totalAmount;
    }

    public function getShippingAmount(): Money
    {
        return $this->shippingAmount;
    }

    public function getTaxAmount(): Money
    {
        return $this->taxAmount;
    }

    public function getDiscountAmount(): Money
    {
        return $this->discountAmount;
    }

    public function getItems(): OrderItemCollection
    {
        return $this->items;
    }

    public function toArray(): array
    {
        return [
            Capture::CAPTURE_ID => $this->getCaptureId(),
            Order::TOTAL_AMOUNT => $this->getTotalAmount()->toArray(),
            Order::ITEMS => $this->getItems()->toArray(),
            Order::SHIPPING_AMOUNT => $this->getShippingAmount()->toArray(),
            Order::TAX_AMOUNT => $this->getTaxAmount()->toArray(),
            Order::DISCOUNT_AMOUNT => $this->getDiscountAmount()->toArray(),
        ];
    }
}
