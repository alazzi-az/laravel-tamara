<?php

declare(strict_types=1);

namespace AlazziAz\Tamara\Tamara\Request\Webhook;

use AlazziAz\Tamara\Tamara\Request\AbstractRequestHandler;
use AlazziAz\Tamara\Tamara\Response\Webhook\RegisterWebhookResponse;

class RegisterWebhookRequestHandler extends AbstractRequestHandler
{
    private const REGISTER_WEBHOOK_ENDPOINT = '/webhooks';

    public function __invoke(RegisterWebhookRequest $request)
    {
        $response = $this->httpClient->post(
            self::REGISTER_WEBHOOK_ENDPOINT,
            $request->toArray()
        );

        return new RegisterWebhookResponse($response);
    }
}
