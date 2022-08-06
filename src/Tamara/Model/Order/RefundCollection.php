<?php

declare(strict_types=1);

namespace AlazziAz\Tamara\Tamara\Model\Order;

use ArrayIterator;

class RefundCollection
{
    /**
     * @var RefundItem[]
     */
    private $data = [];

    public static function create(array $data): RefundCollection
    {
        $self = new self();
        foreach ($data as $itemData) {
            $self->data[] = RefundItem::fromArray($itemData);
        }

        return $self;
    }

    public function toArray(): array
    {
        $ret = [];

        /** @var RefundItem $item */
        foreach ($this->data as $item) {
            $ret[] = $item->toArray();
        }

        return $ret;
    }

    public function getIterator(): ArrayIterator
    {
        return new ArrayIterator($this->data);
    }

    public function count(): int
    {
        return count($this->data);
    }
}
