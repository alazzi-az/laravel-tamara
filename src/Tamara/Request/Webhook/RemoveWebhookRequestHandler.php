<?php

declare(strict_types=1);

namespace AlazziAz\Tamara\Tamara\Request\Webhook;

use AlazziAz\Tamara\Tamara\Request\AbstractRequestHandler;
use AlazziAz\Tamara\Tamara\Response\Webhook\RemoveWebhookResponse;

class RemoveWebhookRequestHandler extends AbstractRequestHandler
{
    private const DELETE_WEBHOOK_ENDPOINT = '/webhooks/%s';

    public function __invoke(RemoveWebhookRequest $request)
    {
        $response = $this->httpClient->delete(
            sprintf(self::DELETE_WEBHOOK_ENDPOINT, $request->getWebhookId())
        );

        return new RemoveWebhookResponse($response);
    }
}
