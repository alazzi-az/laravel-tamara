<?php

declare(strict_types=1);

namespace AlazziAz\Tamara\Tamara\Request\Webhook;

use AlazziAz\Tamara\Tamara\Model\Webhook;

class RegisterWebhookRequest
{
    /**
     * @var string
     */
    private $url;

    /**
     * @var array
     */
    private $events;

    /**
     * @var array|null
     */
    private $headers;

    public function __construct(string $url, array $events)
    {
        $this->url = $url;
        $this->events = $events;
    }

    public function getUrl(): string
    {
        return $this->url;
    }

    public function getEvents(): array
    {
        return $this->events;
    }

    public function getHeaders(): array
    {
        return $this->headers ?? [];
    }

    public function addHeaders(string $key, $value): void
    {
        $this->headers[$key] = $value;
    }

    public function toArray(): array
    {
        return [
            Webhook::URL => $this->getUrl(),
            Webhook::EVENTS => $this->getEvents(),
            Webhook::HEADERS => $this->getHeaders(),
        ];
    }
}
