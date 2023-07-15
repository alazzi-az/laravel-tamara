<?php

namespace AlazziAz\Tamara\Tamara\HttpClient;

use AlazziAz\Tamara\Tamara\Exception\RequestException;
use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface as GuzzleHttpClient;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Exception\RequestException as GuzzleRequestException;
use GuzzleHttp\Psr7\Request;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Log\LoggerInterface;
use Throwable;

class GuzzleHttpAdapter implements ClientInterface
{
    /**
     * @var GuzzleHttpClient
     */
    protected $client;

    /**
     * @var int
     */
    protected $requestTimeout;

    /**
     * @var LoggerInterface
     */
    protected $logger;

    /**
     * @param  int  $requestTimeout
     * @param  LoggerInterface|null  $logger
     */
    public function __construct(int $requestTimeout, LoggerInterface $logger = null)
    {
        $this->client = new Client();
        $this->requestTimeout = $requestTimeout;
        $this->logger = $logger;
    }

    /** {@inheritDoc} */
    public function createRequest(
        string $method,
        $uri,
        array $headers = [],
        $body = null,
        $version = '1.1'
    ): RequestInterface {
        return new Request(
            $method,
            $uri,
            $headers,
            $body
        );
    }

    /**
     * @param  RequestInterface  $request
     * @return ResponseInterface
     *
     * @throws RequestException
     */
    public function sendRequest(RequestInterface $request): ResponseInterface
    {
        try {
            return $this->client->send(
                $request,
                [
                    'timeout' => $this->requestTimeout,
                ]
            );
        } catch (Throwable | GuzzleException | GuzzleRequestException $exception) {
            if (null !== $this->logger) {
                $this->logger->error($exception->getMessage(), $exception->getTrace());
            }

            throw new RequestException(
                $exception->getMessage(),
                $exception->getCode(),
                $request,
                $exception instanceof GuzzleException ? $exception?->getResponse() : null,
                $exception->getPrevious()
            );
        }
    }
}
