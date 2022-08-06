<?php

declare(strict_types=1);

namespace AlazziAz\Tamara\Tamara\Request\Payment;

use AlazziAz\Tamara\Tamara\Request\AbstractRequestHandler;
use AlazziAz\Tamara\Tamara\Response\Payment\RefundResponse;

class RefundRequestHandler extends AbstractRequestHandler
{
    private const CAPTURE_ENDPOINT = '/payments/refund';

    public function __invoke(RefundRequest $request)
    {
        $response = $this->httpClient->post(
            self::CAPTURE_ENDPOINT,
            $request->toArray()
        );

        return new RefundResponse($response);
    }
}
