<?php

declare(strict_types=1);

namespace AlazziAz\Tamara\Tamara\Model\Checkout;

use AlazziAz\Tamara\Tamara\Model\Money;
use AlazziAz\Tamara\Tamara\Model\Order\Order;
use ArrayIterator;
use Countable;
use IteratorAggregate;

class PaymentTypeCollection implements IteratorAggregate, Countable
{
    private const
        NAME = 'name';

    private const
        DESCRIPTION = 'description';

    private const
        MIN_LIMIT = 'min_limit';

    private const
        MAX_LIMIT = 'max_limit';

    /**
     * @var array|PaymentType[]
     */
    private $data = [];

    public function __construct(array $paymentTypes)
    {
        foreach ($paymentTypes as $paymentType) {
            $minLimit = $paymentType[self::MIN_LIMIT];
            $maxLimit = $paymentType[self::MAX_LIMIT];

            $this->data[] = new PaymentType(
                $paymentType[self::NAME],
                $paymentType[self::DESCRIPTION],
                new Money((float) $minLimit[Money::AMOUNT], $minLimit[Money::CURRENCY]),
                new Money((float) $maxLimit[Money::AMOUNT], $maxLimit[Money::CURRENCY]),
                $this->parseSupportedInstalments($paymentType)
            );
        }
    }

    public function getIterator(): ArrayIterator
    {
        return new ArrayIterator($this->data);
    }

    /**
     * {@inheritDoc}
     */
    public function count(): int
    {
        return count($this->data);
    }

    private function parseSupportedInstalments(array $data): array
    {
        $result = [];
        if (isset($data[PaymentType::SUPPORTED_INSTALMENTS]) && ! empty($data[PaymentType::SUPPORTED_INSTALMENTS])) {
            foreach ($data[PaymentType::SUPPORTED_INSTALMENTS] as $item) {
                $minLimit = $item[self::MIN_LIMIT];
                $maxLimit = $item[self::MAX_LIMIT];

                $instalment = new Instalment(
                    (int) $item[Order::INSTALMENTS],
                    new Money((float) $minLimit[Money::AMOUNT], $minLimit[Money::CURRENCY]),
                    new Money((float) $maxLimit[Money::AMOUNT], $maxLimit[Money::CURRENCY])
                );

                $result[] = $instalment;
            }
        }

        return $result;
    }
}
