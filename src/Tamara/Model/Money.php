<?php

declare(strict_types=1);

namespace AlazziAz\Tamara\Tamara\Model;

class Money
{
    public const
        AMOUNT = 'amount';

    public const
        CURRENCY = 'currency';

    /**
     * @var float
     */
    private $amount;

    /**
     * @var string
     */
    private $currency;

    public function __construct(float $amount, string $currency)
    {
        $this->amount = $amount;
        $this->currency = $currency;
    }

    public function getAmount()
    {
        return $this->amount;
    }

    public function getCurrency()
    {
        return $this->currency;
    }

    /**
     * @param  float  $amount
     */
    public function setAmount(float $amount): void
    {
        $this->amount = $amount;
    }

    /**
     * @param  string  $currency
     */
    public function setCurrency(string $currency): void
    {
        $this->currency = $currency;
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return [
            self::AMOUNT => $this->getAmount(),
            self::CURRENCY => $this->getCurrency(),
        ];
    }

    /**
     * @param  array  $data
     * @return Money
     */
    public static function fromArray(array $data)
    {
        return new self(
            (float) $data[self::AMOUNT],
            $data[self::CURRENCY]
        );
    }
}
