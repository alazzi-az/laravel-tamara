<?php

declare(strict_types=1);

namespace AlazziAz\Tamara\Tamara\Model\Order;

use AlazziAz\Tamara\Tamara\Model\Money;
use AlazziAz\Tamara\Tamara\Model\ShippingInfo;
use DateTime;
use DateTimeImmutable;

class CaptureItem
{
    private const
        CAPTURE_ID = 'capture_id';

    private const
        ORDER_ID = 'order_id';

    private const
        TOTAL_AMOUNT = 'total_amount';

    private const
        REFUNDED_AMOUNT = 'refunded_amount';

    private const
        TAX_AMOUNT = 'tax_amount';

    private const
        SHIPPING_AMOUNT = 'shipping_amount';

    private const
        DISCOUNT_AMOUNT = 'discount_amount';

    private const
        SHIPPING_INFO = 'shipping_info';

    private const
        ITEMS = 'items';

    private const
        CREATED_AT = 'created_at';

    /**
     * @var string
     */
    private $captureId;

    /**
     * @var string
     */
    private $orderId;

    /**
     * @var Money
     */
    private $totalAmount;

    /**
     * @var Money
     */
    private $refundedAmount;

    /**
     * @var Money
     */
    private $taxAmount;

    /**
     * @var Money
     */
    private $shippingAmount;

    /**
     * @var Money
     */
    private $discountAmount;

    /**
     * @var ShippingInfo
     */
    private $shippingInfo;

    /**
     * @var OrderItemCollection
     */
    private $items;

    /**
     * @var DateTimeImmutable
     */
    private $createdAt;

    public static function fromArray(array $data): CaptureItem
    {
        $self = new self();
        $self->setCaptureId($data[self::CAPTURE_ID]);
        $self->setOrderId($data[self::ORDER_ID]);
        $self->setTotalAmount(Money::fromArray($data[self::TOTAL_AMOUNT]));
        $self->setRefundedAmount(Money::fromArray($data[self::REFUNDED_AMOUNT]));
        $self->setTaxAmount(Money::fromArray($data[self::TAX_AMOUNT]));
        $self->setShippingAmount(Money::fromArray($data[self::SHIPPING_AMOUNT]));
        $self->setDiscountAmount(Money::fromArray($data[self::DISCOUNT_AMOUNT]));
        $self->setShippingInfo(ShippingInfo::fromArray($data[self::SHIPPING_INFO]));
        $self->setItems(OrderItemCollection::create($data[self::ITEMS]));
        $self->setCreatedAt(new DateTimeImmutable($data[self::CREATED_AT]));

        return $self;
    }

    public function getCaptureId(): string
    {
        return $this->captureId;
    }

    public function setCaptureId(string $captureId): void
    {
        $this->captureId = $captureId;
    }

    public function getOrderId(): string
    {
        return $this->orderId;
    }

    public function setOrderId(string $orderId): void
    {
        $this->orderId = $orderId;
    }

    public function getTotalAmount(): Money
    {
        return $this->totalAmount;
    }

    public function setTotalAmount(Money $totalAmount): void
    {
        $this->totalAmount = $totalAmount;
    }

    public function getRefundedAmount(): Money
    {
        return $this->refundedAmount;
    }

    public function setRefundedAmount(Money $refundedAmount): void
    {
        $this->refundedAmount = $refundedAmount;
    }

    public function getTaxAmount(): Money
    {
        return $this->taxAmount;
    }

    public function setTaxAmount(Money $taxAmount): void
    {
        $this->taxAmount = $taxAmount;
    }

    public function getShippingAmount(): Money
    {
        return $this->shippingAmount;
    }

    public function setShippingAmount(Money $shippingAmount): void
    {
        $this->shippingAmount = $shippingAmount;
    }

    public function getDiscountAmount(): Money
    {
        return $this->discountAmount;
    }

    public function setDiscountAmount(Money $discountAmount): void
    {
        $this->discountAmount = $discountAmount;
    }

    public function getShippingInfo(): ShippingInfo
    {
        return $this->shippingInfo;
    }

    public function setShippingInfo(ShippingInfo $shippingInfo): void
    {
        $this->shippingInfo = $shippingInfo;
    }

    public function getItems(): OrderItemCollection
    {
        return $this->items;
    }

    public function setItems(OrderItemCollection $items): void
    {
        $this->items = $items;
    }

    public function getCreatedAt(): DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(DateTimeImmutable $createdAt): void
    {
        $this->createdAt = $createdAt;
    }

    public function toArray(): array
    {
        return [
            self::CAPTURE_ID => $this->getCaptureId(),
            self::ORDER_ID => $this->getOrderId(),
            self::TOTAL_AMOUNT => $this->getTotalAmount()->toArray(),
            self::REFUNDED_AMOUNT => $this->getRefundedAmount()->toArray(),
            self::SHIPPING_AMOUNT => $this->getShippingAmount()->toArray(),
            self::TAX_AMOUNT => $this->getTaxAmount()->toArray(),
            self::DISCOUNT_AMOUNT => $this->getDiscountAmount()->toArray(),
            self::SHIPPING_INFO => $this->getShippingInfo()->toArray(),
            self::ITEMS => $this->getItems()->toArray(),
            self::CREATED_AT => $this->getCreatedAt()->format(DateTime::ATOM),
        ];
    }
}
