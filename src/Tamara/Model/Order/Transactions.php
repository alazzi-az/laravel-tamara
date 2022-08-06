<?php

declare(strict_types=1);

namespace AlazziAz\Tamara\Tamara\Model\Order;

class Transactions
{
    private const
        CANCELS = 'cancels';

    private const
        CAPTURES = 'captures';

    private const
        REFUNDS = 'refunds';

    /**
     * @var CancelCollection
     */
    private $cancels;

    /**
     * @var CaptureCollection
     */
    private $captures;

    /**
     * @var RefundCollection
     */
    private $refunds;

    public static function fromArray(array $data): Transactions
    {
        $self = new self();
        $self->setCancels(CancelCollection::create($data[self::CANCELS]));
        $self->setCaptures(CaptureCollection::create($data[self::CAPTURES]));
        $self->setRefunds(RefundCollection::create($data[self::REFUNDS]));

        return $self;
    }

    public function getCancels(): CancelCollection
    {
        return $this->cancels;
    }

    public function setCancels(CancelCollection $cancels): void
    {
        $this->cancels = $cancels;
    }

    public function getCaptures(): CaptureCollection
    {
        return $this->captures;
    }

    public function setCaptures(CaptureCollection $captures): void
    {
        $this->captures = $captures;
    }

    public function getRefunds(): RefundCollection
    {
        return $this->refunds;
    }

    public function setRefunds(RefundCollection $refunds): void
    {
        $this->refunds = $refunds;
    }

    public function toArray(): array
    {
        return [
            self::CANCELS => $this->getCancels()->toArray(),
            self::CAPTURES => $this->getCaptures()->toArray(),
            self::REFUNDS => $this->getRefunds()->toArray(),
        ];
    }
}
