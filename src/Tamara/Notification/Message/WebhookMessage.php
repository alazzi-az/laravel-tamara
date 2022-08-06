<?php

declare(strict_types=1);

namespace AlazziAz\Tamara\Tamara\Notification\Message;

use AlazziAz\Tamara\Tamara\Notification\AbstractMessage;

class WebhookMessage extends AbstractMessage
{
    private const EVENT_TYPE = 'event_type';

    /**
     * @var string
     */
    private $eventType;

    public function __construct(string $orderId, string $orderReferenceId, array $data, string $eventType)
    {
        parent::__construct($orderId, $orderReferenceId, $data);
        $this->eventType = $eventType;
    }

    public static function fromArray(array $data): AbstractMessage
    {
        return new static(
            $data[self::ORDER_ID],
            $data[self::ORDER_REFERENCE_ID],
            $data[self::DATA],
            $data[self::EVENT_TYPE]
        );
    }

    public function getEventType(): string
    {
        return $this->eventType;
    }
}
