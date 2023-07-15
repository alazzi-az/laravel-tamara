<?php

namespace AlazziAz\Tamara\Tamara\HttpClient;

use AlazziAz\Tamara\Tamara\Client;
use AlazziAz\Tamara\Tamara\Exception\RequestException;
use Psr\Http\Client\ClientExceptionInterface;
use Psr\Http\Message\ResponseInterface;

class HttpClient
{
    /**
     * @var string
     */
    private $apiUrl;

    /**
     * @var string
     */
    private $apiToken;

    /**
     * @var ClientInterface
     */
    private $transport;

    /**
     * @param  string  $apiUrl
     * @param  string  $apiToken
     * @param  ClientInterface  $transport
     */
    public function __construct(
        string $apiUrl,
        string $apiToken,
        ClientInterface $transport
    ) {
        $this->apiUrl = $apiUrl;
        $this->apiToken = $apiToken;
        $this->transport = $transport;
    }

    /**
     * @param  string  $path
     * @param  array  $params
     * @return ResponseInterface
     *
     * @throws ClientExceptionInterface
     * @throws RequestException
     */
    public function get(string $path, array $params = []): ResponseInterface
    {
        return $this->request('GET', $path, $params);
    }

    /**
     * @param  string  $path
     * @param  array  $params
     * @return ResponseInterface
     *
     * @throws ClientExceptionInterface
     */
    public function put(string $path, array $params = []): ResponseInterface
    {
        return $this->request('PUT', $path, $params);
    }

    /**
     * @param  string  $path
     * @param  array  $params
     * @return ResponseInterface
     *
     * @throws ClientExceptionInterface
     */
    public function post(string $path, array $params = []): ResponseInterface
    {
        return $this->request('POST', $path, $params);
    }

    /**
     * @param  string  $path
     * @param  array  $params
     * @return ResponseInterface
     *
     * @throws ClientExceptionInterface
     */
    public function delete(string $path, array $params = []): ResponseInterface
    {
        return $this->request('DELETE', $path, $params);
    }

    /**
     * @param  string  $method
     * @param  string  $path
     * @param  array  $params
     * @return ResponseInterface
     *
     * @throws ClientExceptionInterface|RequestException
     */
    private function request(string $method, string $path, array $params = []): ResponseInterface
    {
        if ('GET' === $method) {
            $path = $this->prepareQueryString($path, $params);
        }

        $headers = [
            'User-Agent' => sprintf('Tamara Client SDK %s, PHP version %s', Client::VERSION, phpversion()),
            'Content-Type' => 'application/json',
            'Authorization' => sprintf('Bearer %s', $this->apiToken),
        ];

        $request = $this->transport->createRequest(
            $method,
            $this->prepareUrl($path),
            $headers,
            json_encode($params)
        );

        try {
            return $this->transport->sendRequest($request);
        } catch (ClientExceptionInterface $exception) {
            $level = (int) floor($exception->getCode() / 100);

            if ($level < 2 || $level > 4) {
                throw $exception;
            }

            if ($exception instanceof RequestException) {
                return $exception->getResponse();
            }

            throw $exception;
        }

    }

    /**
     * @param  string  $path
     * @return string
     */
    private function prepareUrl(string $path): string
    {
        return $this->apiUrl.'/'.ltrim($path, '/');
    }

    /**
     * @param  string  $path
     * @param  array  $params
     * @return string
     */
    private function prepareQueryString(string $path, array $params = []): string
    {
        if (! $params) {
            return $path;
        }

        $path .= false === strpos($path, '?') ? '?' : '&';
        $path .= http_build_query($params, '', '&');

        return $path;
    }
}
