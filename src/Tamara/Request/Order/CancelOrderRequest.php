<?php

declare(strict_types=1);

namespace AlazziAz\Tamara\Tamara\Request\Order;

use AlazziAz\Tamara\Tamara\Model\Money;
use AlazziAz\Tamara\Tamara\Model\Order\OrderItemCollection;

class CancelOrderRequest
{
    private const
        TOTAL_AMOUNT = 'total_amount';

    private const
        TAX_AMOUNT = 'tax_amount';

    private const
        SHIPPING_AMOUNT = 'shipping_amount';

    private const
        DISCOUNT_AMOUNT = 'discount_amount';

    private const
        ITEMS = 'items';

    /**
     * @var string
     */
    private $orderId;

    /**
     * @var Money
     */
    private $totalAmount;

    /**
     * @var OrderItemCollection
     */
    private $items;

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

    public function __construct(
        string $orderId,
        Money $totalAmount,
        OrderItemCollection $items,
        Money $shippingAmount,
        Money $taxAmount,
        Money $discountAmount
    ) {
        $this->orderId = $orderId;
        $this->totalAmount = $totalAmount;
        $this->items = $items;
        $this->shippingAmount = $shippingAmount;
        $this->taxAmount = $taxAmount;
        $this->discountAmount = $discountAmount;
    }

    public function getOrderId(): string
    {
        return $this->orderId;
    }

    public function getTotalAmount(): Money
    {
        return $this->totalAmount;
    }

    public function getItems(): OrderItemCollection
    {
        return $this->items;
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

    public function toArray(): array
    {
        return [
            self::TOTAL_AMOUNT => $this->getTotalAmount()->toArray(),
            self::TAX_AMOUNT => $this->getTaxAmount()->toArray(),
            self::SHIPPING_AMOUNT => $this->getShippingAmount()->toArray(),
            self::DISCOUNT_AMOUNT => $this->getDiscountAmount()->toArray(),
            self::ITEMS => $this->getItems()->toArray(),
        ];
    }
}
