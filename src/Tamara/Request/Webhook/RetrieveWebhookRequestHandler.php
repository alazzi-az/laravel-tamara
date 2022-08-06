<?php

declare(strict_types=1);

namespace AlazziAz\Tamara\Tamara\Request\Webhook;

use AlazziAz\Tamara\Tamara\Request\AbstractRequestHandler;
use AlazziAz\Tamara\Tamara\Response\Webhook\RetrieveWebhookResponse;

class RetrieveWebhookRequestHandler extends AbstractRequestHandler
{
    private const RETRIEVE_WEBHOOK_ENDPOINT = '/webhooks/%s';

    public function __invoke(RetrieveWebhookRequest $request)
    {
        $response = $this->httpClient->get(
            sprintf(self::RETRIEVE_WEBHOOK_ENDPOINT, $request->getWebhookId())
        );

        return new RetrieveWebhookResponse($response);
    }
}
