<?php

declare(strict_types=1);

namespace AlazziAz\Tamara\Tamara\Request;

use AlazziAz\Tamara\Tamara\HttpClient\HttpClient;

abstract class AbstractRequestHandler
{
    /**
     * @var HttpClient
     */
    protected $httpClient;

    public function __construct(HttpClient $httpClient)
    {
        $this->httpClient = $httpClient;
    }
}
