<?php

declare(strict_types=1);

namespace AlazziAz\Tamara\Tamara\Response\Webhook;

use AlazziAz\Tamara\Tamara\Model\Webhook;
use AlazziAz\Tamara\Tamara\Response\ClientResponse;

class RegisterWebhookResponse extends ClientResponse
{
    /**
     * @var string
     */
    private $webhookId;

    public function getWebhookId(): string
    {
        return $this->webhookId;
    }

    protected function parse(array $responseData): void
    {
        $this->webhookId = $responseData[Webhook::WEBHOOK_ID];
    }
}
