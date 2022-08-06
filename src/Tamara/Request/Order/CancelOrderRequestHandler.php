<?php

declare(strict_types=1);

namespace AlazziAz\Tamara\Tamara\Request\Order;

use AlazziAz\Tamara\Tamara\Request\AbstractRequestHandler;
use AlazziAz\Tamara\Tamara\Response\Payment\CancelResponse;

class CancelOrderRequestHandler extends AbstractRequestHandler
{
    private const CANCEL_ORDER_ENDPOINT = '/orders/%s/cancel';

    public function __invoke(CancelOrderRequest $request)
    {
        $response = $this->httpClient->post(
            sprintf(self::CANCEL_ORDER_ENDPOINT, $request->getOrderId()),
            $request->toArray()
        );

        return new CancelResponse($response);
    }
}
