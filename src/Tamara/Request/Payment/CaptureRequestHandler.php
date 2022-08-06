<?php

declare(strict_types=1);

namespace AlazziAz\Tamara\Tamara\Request\Payment;

use AlazziAz\Tamara\Tamara\Request\AbstractRequestHandler;
use AlazziAz\Tamara\Tamara\Response\Payment\CaptureResponse;

class CaptureRequestHandler extends AbstractRequestHandler
{
    private const CAPTURE_ENDPOINT = '/payments/capture';

    public function __invoke(CaptureRequest $request)
    {
        $response = $this->httpClient->post(
            self::CAPTURE_ENDPOINT,
            $request->getCapture()->toArray()
        );

        return new CaptureResponse($response);
    }
}
