<?php

declare(strict_types=1);

namespace AlazziAz\Tamara\Tamara\Response\Checkout;

use AlazziAz\Tamara\Tamara\Model\Checkout\CheckoutResponse;
use AlazziAz\Tamara\Tamara\Response\ClientResponse;

class CreateCheckoutResponse extends ClientResponse
{
    /**
     * @var CheckoutResponse|null
     */
    private $checkoutResponse;

    public function getCheckoutResponse(): ?CheckoutResponse
    {
        return $this->checkoutResponse;
    }

    protected function parse(array $responseData): void
    {
        $this->checkoutResponse = new CheckoutResponse($responseData);
    }
}
