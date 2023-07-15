<?php

namespace AlazziAz\Tamara\Tamara;

use AlazziAz\Tamara\Tamara\HttpClient\AdapterFactory;
use AlazziAz\Tamara\Tamara\HttpClient\HttpClient;
use Psr\Http\Client\ClientInterface;
use Psr\Log\LoggerInterface;

class Configuration
{
    /**
     * @var string
     */
    protected $apiUrl;

    /**
     * @var string
     */
    protected $apiToken;

    /**
     * @var int in seconds
     */
    protected $apiRequestTimeout = 120;

    /**
     * @var ClientInterface
     */
    protected $transport;

    /**
     * @var LoggerInterface
     */
    protected $logger;

    public static function create(
        string $apiUrl,
        string $apiToken,
        int $apiRequestTimeout = null,
        LoggerInterface $logger = null,
        ClientInterface $transport = null
    ): Configuration {
        return new self($apiUrl, $apiToken, $apiRequestTimeout, $logger, $transport);
    }

    public function __construct(
        string $apiUrl,
        string $apiToken,
        int $apiRequestTimeout = null,
        LoggerInterface $logger = null,
        ClientInterface $transport = null
    ) {
        $this->apiUrl = $apiUrl;
        $this->apiToken = $apiToken;

        if (null !== $apiRequestTimeout) {
            $this->apiRequestTimeout = $apiRequestTimeout;
        }

        $this->logger = $logger;
        $this->transport = $transport;
    }

    public function createHttpClient(): HttpClient
    {
        $transport = $this->transport ?? $this->createDefaultTransport();

        /** @var \AlazziAz\Tamara\Tamara\HttpClient\ClientInterface $transport */
        return new HttpClient(
            $this->getApiUrl(),
            $this->getApiToken(),
            $transport
        );
    }

    public function getApiUrl(): string
    {
        return $this->apiUrl;
    }

    public function getApiToken(): string
    {
        return $this->apiToken;
    }

    public function getApiRequestTimeout(): int
    {
        return $this->apiRequestTimeout;
    }

    public function getLogger(): ?LoggerInterface
    {
        return $this->logger ?? null;
    }

    protected function createDefaultTransport(): ClientInterface
    {
        return AdapterFactory::create($this->getApiRequestTimeout(), $this->getLogger());
    }
}
