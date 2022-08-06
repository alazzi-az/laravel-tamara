<?php

declare(strict_types=1);

namespace AlazziAz\Tamara\Tamara\Model\Payment;

use AlazziAz\Tamara\Tamara\Model\Money;
use AlazziAz\Tamara\Tamara\Model\Order\Order;
use AlazziAz\Tamara\Tamara\Model\Order\OrderItemCollection;
use AlazziAz\Tamara\Tamara\Model\ShippingInfo;

class Capture
{
    public const
        CAPTURE_ID = 'capture_id';

    public const
        SHIPPING_INFO = 'shipping_info';

    /**
     * @var string Tamara order id
     */
    private $orderId;

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

    /**
     * @var ShippingInfo
     */
    private $shippingInfo;

    public function __construct(
        string $orderId,
        Money $totalAmount,
        Money $shippingAmount,
        Money $taxAmount,
        Money $discountAmount,
        OrderItemCollection $items,
        ShippingInfo $shippingInfo
    ) {
        $this->orderId = $orderId;
        $this->totalAmount = $totalAmount;
        $this->shippingAmount = $shippingAmount;
        $this->taxAmount = $taxAmount;
        $this->discountAmount = $discountAmount;
        $this->items = $items;
        $this->shippingInfo = $shippingInfo;
    }

    public function getOrderId(): string
    {
        return $this->orderId;
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

    public function getShippingInfo(): ShippingInfo
    {
        return $this->shippingInfo;
    }

    public function toArray(): array
    {
        return [
            Order::ORDER_ID => $this->getOrderId(),
            Order::TOTAL_AMOUNT => $this->getTotalAmount()->toArray(),
            Order::ITEMS => $this->getItems()->toArray(),
            Order::SHIPPING_AMOUNT => $this->getShippingAmount()->toArray(),
            Order::TAX_AMOUNT => $this->getTaxAmount()->toArray(),
            Order::DISCOUNT_AMOUNT => $this->getDiscountAmount()->toArray(),
            self::SHIPPING_INFO => $this->getShippingInfo()->toArray(),
        ];
    }
}
