<?php

declare(strict_types=1);

namespace AlazziAz\Tamara\Tamara\Request\Order;

use AlazziAz\Tamara\Tamara\Request\AbstractRequestHandler;
use AlazziAz\Tamara\Tamara\Response\Order\GetOrderResponse;

class GetOrderRequestHandler extends AbstractRequestHandler
{
    private const GET_ORDER_URL = '/merchants/orders/%s';

    public function __invoke(GetOrderRequest $request)
    {
        $response = $this->httpClient->get(
            sprintf(self::GET_ORDER_URL, $request->getOrderId())
        );

        return new GetOrderResponse($response);
    }
}
