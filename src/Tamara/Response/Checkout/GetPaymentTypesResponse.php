<?php

namespace AlazziAz\Tamara\Tamara\Response\Checkout;

use AlazziAz\Tamara\Tamara\Model\Checkout\PaymentTypeCollection;
use AlazziAz\Tamara\Tamara\Response\ClientResponse;

class GetPaymentTypesResponse extends ClientResponse
{
    /**
     * @var array|PaymentTypeCollection
     */
    private $paymentTypes;

    /**
     * @return PaymentTypeCollection|null
     */
    public function getPaymentTypes(): ?PaymentTypeCollection
    {
        return $this->isSuccess() ? $this->paymentTypes : null;
    }

    protected function parse(array $responseData): void
    {
        $this->paymentTypes = new PaymentTypeCollection($responseData);
    }
}
