<?php

declare(strict_types=1);

namespace AlazziAz\Tamara\Tamara\Request\Checkout;

use AlazziAz\Tamara\Tamara\Request\AbstractRequestHandler;
use AlazziAz\Tamara\Tamara\Response\Checkout\CreateCheckoutResponse;

class CreateCheckoutRequestHandler extends AbstractRequestHandler
{
    private const CHECKOUT_ENDPOINT = '/checkout';

    public function __invoke(CreateCheckoutRequest $request)
    {
        $response = $this->httpClient->post(
            self::CHECKOUT_ENDPOINT,
            $request->getOrder()->toArray()
        );

        return new CreateCheckoutResponse($response);
    }
}
