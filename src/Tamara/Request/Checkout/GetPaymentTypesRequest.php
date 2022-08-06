<?php

declare(strict_types=1);

namespace AlazziAz\Tamara\Tamara\Request\Checkout;

class GetPaymentTypesRequest
{
    /**
     * @var string
     */
    private $countryCode;

    /**
     * @var string
     */
    private $currency;

    public function __construct(string $countryCode, string $currency = '')
    {
        $this->countryCode = trim($countryCode);
        $this->currency = trim($currency);
    }

    public function getCountryCode(): string
    {
        return $this->countryCode;
    }

    public function getCurrency(): string
    {
        return $this->currency;
    }
}
