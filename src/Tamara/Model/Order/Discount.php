<?php

declare(strict_types=1);

namespace AlazziAz\Tamara\Tamara\Model\Order;

use AlazziAz\Tamara\Tamara\Model\Money;

class Discount
{
    public const
        NAME = 'name';

    public const
        AMOUNT = 'amount';

    /**
     * @var string
     */
    private $name;

    /**
     * @var Money
     */
    private $amount;

    public function __construct(string $name, Money $amount)
    {
        $this->name = $name;
        $this->amount = $amount;
    }

    public static function fromArray(array $data): Discount
    {
        return new self($data[self::NAME], Money::fromArray($data[self::AMOUNT]));
    }

    public function setName(string $name): Discount
    {
        $this->name = $name;

        return $this;
    }

    public function setAmount(Money $amount): Discount
    {
        $this->amount = $amount;

        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getAmount(): Money
    {
        return $this->amount;
    }

    public function toArray(): array
    {
        return [
            self::NAME => $this->getName(),
            self::AMOUNT => $this->getAmount()->toArray(),
        ];
    }
}
