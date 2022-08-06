<?php

declare(strict_types=1);

namespace AlazziAz\Tamara\Tamara\Model\Checkout;

use AlazziAz\Tamara\Tamara\Model\Money;

class PaymentType
{
    public const
        NAME = 'name';

    public const
        DESCRIPTION = 'description';

    public const
        MIN_LIMIT = 'min_limit';

    public const
        MAX_LIMIT = 'max_limit';

    public const
        SUPPORTED_INSTALMENTS = 'supported_instalments';

    private $name;

    private $description;

    private $minLimit;

    private $maxLimit;

    /**
     * @var Instalment[]
     */
    private $supportedInstalments;

    public function __construct(
        string $name,
        string $description,
        Money $minLimit,
        Money $maxLimit,
        array $supportedInstalments = []
    ) {
        $this->name = $name;
        $this->description = $description;
        $this->minLimit = $minLimit;
        $this->maxLimit = $maxLimit;
        $this->supportedInstalments = $supportedInstalments;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getMinLimit(): Money
    {
        return $this->minLimit;
    }

    public function getMaxLimit(): Money
    {
        return $this->maxLimit;
    }

    /**
     * @return Instalment[]
     */
    public function getSupportedInstalments(): array
    {
        return $this->supportedInstalments;
    }

    public function toArray(): array
    {
        $result = [
            self::NAME => $this->getName(),
            self::DESCRIPTION => $this->getDescription(),
            self::MIN_LIMIT => $this->getMinLimit()->toArray(),
            self::MAX_LIMIT => $this->getMaxLimit()->toArray(),
        ];

        if (! empty($this->getSupportedInstalments())) {
            foreach ($this->getSupportedInstalments() as $instalment) {
                $result[self::SUPPORTED_INSTALMENTS][] = $instalment->toArray();
            }
        }

        return $result;
    }
}
