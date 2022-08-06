<?php

declare(strict_types=1);

namespace AlazziAz\Tamara\Tamara\Model\Order;

use AlazziAz\Tamara\Tamara\Model\Money;

class OrderItem
{
    public const
        REFERENCE_ID = 'reference_id';

    public const
        TYPE = 'type';

    public const
        NAME = 'name';

    public const
        SKU = 'sku';

    public const
        QUANTITY = 'quantity';

    public const
        TAX_AMOUNT = 'tax_amount';

    public const
        TOTAL_AMOUNT = 'total_amount';

    public const
        UNIT_PRICE = 'unit_price';

    public const
        DISCOUNT_AMOUNT = 'discount_amount';

    public const
        IMAGE_URL = 'image_url';

    /**
     * @var string
     */
    private $referenceId;

    /**
     * @var string
     */
    private $type;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $sku;

    /**
     * @var int
     */
    private $quantity;

    /**
     * @var Money
     */
    private $taxAmount;

    /**
     * @var Money
     */
    private $totalAmount;

    /**
     * @var Money|null
     */
    private $unitPrice;

    /**
     * @var Money|null
     */
    private $discountAmount;

    /**
     * @var string
     */
    private $imageUrl;

    public static function fromArray(array $data): OrderItem
    {
        $self = new self();
        $self->setName($data[self::NAME]);
        $self->setReferenceId($data[self::REFERENCE_ID]);
        $self->setSku($data[self::SKU] ?? '');
        $self->setType($data[self::TYPE] ?? '');
        $self->setQuantity((int) $data[self::QUANTITY]);
        $self->setUnitPrice(Money::fromArray($data[self::UNIT_PRICE]));
        $self->setTotalAmount(Money::fromArray($data[self::TOTAL_AMOUNT]));
        $self->setTaxAmount(Money::fromArray($data[self::TAX_AMOUNT]));
        $self->setDiscountAmount(Money::fromArray($data[self::DISCOUNT_AMOUNT]));
        $self->setImageUrl($data[self::IMAGE_URL] ?? '');

        return $self;
    }

    public function getReferenceId(): string
    {
        return $this->referenceId;
    }

    public function getType(): string
    {
        return $this->type ?? '';
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getSku(): string
    {
        return $this->sku;
    }

    public function getQuantity(): int
    {
        return $this->quantity;
    }

    public function getTaxAmount(): Money
    {
        return $this->taxAmount;
    }

    public function getTotalAmount(): Money
    {
        return $this->totalAmount;
    }

    /**
     * @return Money|null
     */
    public function getUnitPrice(): ?Money
    {
        return $this->unitPrice;
    }

    /**
     * @return Money|null
     */
    public function getDiscountAmount(): ?Money
    {
        return $this->discountAmount;
    }

    public function setReferenceId(string $referenceId): OrderItem
    {
        $this->referenceId = $referenceId;

        return $this;
    }

    public function setType(string $type): OrderItem
    {
        $this->type = $type;

        return $this;
    }

    public function setName(string $name): OrderItem
    {
        $this->name = $name;

        return $this;
    }

    public function setSku(string $sku): OrderItem
    {
        $this->sku = $sku;

        return $this;
    }

    public function setQuantity(int $quantity): OrderItem
    {
        $this->quantity = $quantity;

        return $this;
    }

    public function setTaxAmount(Money $taxAmount): OrderItem
    {
        $this->taxAmount = $taxAmount;

        return $this;
    }

    public function setTotalAmount(Money $totalAmount): OrderItem
    {
        $this->totalAmount = $totalAmount;

        return $this;
    }

    public function setUnitPrice(Money $unitPrice): OrderItem
    {
        $this->unitPrice = $unitPrice;

        return $this;
    }

    public function setDiscountAmount(Money $discountAmount): OrderItem
    {
        $this->discountAmount = $discountAmount;

        return $this;
    }

    public function setImageUrl(string $imageUrl): OrderItem
    {
        $this->imageUrl = $imageUrl;

        return $this;
    }

    public function getImageUrl(): string
    {
        return $this->imageUrl ?? '';
    }

    public function toArray(): array
    {
        return [
            self::REFERENCE_ID => $this->getReferenceId(),
            self::TYPE => $this->getType(),
            self::NAME => $this->getName(),
            self::SKU => $this->getSku(),
            self::QUANTITY => $this->getQuantity(),
            self::TAX_AMOUNT => $this->getTaxAmount()->toArray(),
            self::TOTAL_AMOUNT => $this->getTotalAmount()->toArray(),
            self::UNIT_PRICE => $this->getUnitPrice() ? $this->getUnitPrice()->toArray() : null,
            self::DISCOUNT_AMOUNT => $this->getDiscountAmount() ? $this->getDiscountAmount()->toArray() : null,
            self::IMAGE_URL => $this->getImageUrl(),
        ];
    }
}
