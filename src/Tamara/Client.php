<?php

namespace AlazziAz\Tamara\Tamara;

use AlazziAz\Tamara\Tamara\Exception\RequestDispatcherException;
use AlazziAz\Tamara\Tamara\HttpClient\HttpClient;
use AlazziAz\Tamara\Tamara\Request\Checkout\CreateCheckoutRequest;
use AlazziAz\Tamara\Tamara\Request\Checkout\GetPaymentTypesRequest;
use AlazziAz\Tamara\Tamara\Request\Checkout\GetPaymentTypesV2Request;
use AlazziAz\Tamara\Tamara\Request\Order\AuthoriseOrderRequest;
use AlazziAz\Tamara\Tamara\Request\Order\CancelOrderRequest;
use AlazziAz\Tamara\Tamara\Request\Order\GetOrderByReferenceIdRequest;
use AlazziAz\Tamara\Tamara\Request\Order\GetOrderRequest;
use AlazziAz\Tamara\Tamara\Request\Order\UpdateReferenceIdRequest;
use AlazziAz\Tamara\Tamara\Request\Payment\CaptureRequest;
use AlazziAz\Tamara\Tamara\Request\Payment\RefundRequest;
use AlazziAz\Tamara\Tamara\Request\RequestDispatcher;
use AlazziAz\Tamara\Tamara\Request\Webhook\RegisterWebhookRequest;
use AlazziAz\Tamara\Tamara\Request\Webhook\RemoveWebhookRequest;
use AlazziAz\Tamara\Tamara\Request\Webhook\RetrieveWebhookRequest;
use AlazziAz\Tamara\Tamara\Request\Webhook\UpdateWebhookRequest;
use AlazziAz\Tamara\Tamara\Response\Checkout\CreateCheckoutResponse;
use AlazziAz\Tamara\Tamara\Response\Checkout\GetPaymentTypesResponse;
use AlazziAz\Tamara\Tamara\Response\Order\AuthoriseOrderResponse;
use AlazziAz\Tamara\Tamara\Response\Order\GetOrderByReferenceIdResponse;
use AlazziAz\Tamara\Tamara\Response\Order\GetOrderResponse;
use AlazziAz\Tamara\Tamara\Response\Order\UpdateReferenceIdResponse;
use AlazziAz\Tamara\Tamara\Response\Payment\CancelResponse;
use AlazziAz\Tamara\Tamara\Response\Payment\CaptureResponse;
use AlazziAz\Tamara\Tamara\Response\Payment\RefundResponse;
use AlazziAz\Tamara\Tamara\Response\Webhook\RegisterWebhookResponse;
use AlazziAz\Tamara\Tamara\Response\Webhook\RemoveWebhookResponse;
use AlazziAz\Tamara\Tamara\Response\Webhook\RetrieveWebhookResponse;
use AlazziAz\Tamara\Tamara\Response\Webhook\UpdateWebhookResponse;

class Client
{
    /**
     * @var string
     */
    public const VERSION = '1.3.7';

    /**
     * @var HttpClient
     */
    protected $httpClient;

    /**
     * @var RequestDispatcher
     */
    private $requestDispatcher;

    public static function create(Configuration $configuration): Client
    {
        return new self($configuration->createHttpClient());
    }

    public function __construct(HttpClient $httpClient)
    {
        $this->httpClient = $httpClient;
        $this->requestDispatcher = new RequestDispatcher($httpClient);
    }

    /**
     * @throws RequestDispatcherException
     */
    public function getPaymentTypes(string $countryCode, string $currency = ''): GetPaymentTypesResponse
    {
        return $this->requestDispatcher->dispatch(new GetPaymentTypesRequest($countryCode, $currency));
    }

    /**
     * @throws RequestDispatcherException
     */
    public function getPaymentTypesV2(GetPaymentTypesV2Request $request): GetPaymentTypesResponse
    {
        return $this->requestDispatcher->dispatch($request);
    }

    /**
     * @throws RequestDispatcherException
     */
    public function createCheckout(CreateCheckoutRequest $createCheckoutRequest): CreateCheckoutResponse
    {
        return $this->requestDispatcher->dispatch($createCheckoutRequest);
    }

    /**
     * @throws RequestDispatcherException
     */
    public function authoriseOrder(AuthoriseOrderRequest $authoriseOrderRequest): AuthoriseOrderResponse
    {
        return $this->requestDispatcher->dispatch($authoriseOrderRequest);
    }

    /**
     * @throws RequestDispatcherException
     */
    public function cancelOrder(CancelOrderRequest $cancelOrderRequest): CancelResponse
    {
        return $this->requestDispatcher->dispatch($cancelOrderRequest);
    }

    /**
     * @throws RequestDispatcherException
     */
    public function capture(CaptureRequest $captureRequest): CaptureResponse
    {
        return $this->requestDispatcher->dispatch($captureRequest);
    }

    /**
     * @throws RequestDispatcherException
     */
    public function refund(RefundRequest $refundRequest): RefundResponse
    {
        return $this->requestDispatcher->dispatch($refundRequest);
    }

    /**
     * @throws RequestDispatcherException
     */
    public function registerWebhook(RegisterWebhookRequest $request): RegisterWebhookResponse
    {
        return $this->requestDispatcher->dispatch($request);
    }

    /**
     * @throws RequestDispatcherException
     */
    public function retrieveWebhook(RetrieveWebhookRequest $request): RetrieveWebhookResponse
    {
        return $this->requestDispatcher->dispatch($request);
    }

    /**
     * @throws RequestDispatcherException
     */
    public function removeWebhook(RemoveWebhookRequest $request): RemoveWebhookResponse
    {
        return $this->requestDispatcher->dispatch($request);
    }

    /**
     * @throws RequestDispatcherException
     */
    public function updateWebhook(UpdateWebhookRequest $request): UpdateWebhookResponse
    {
        return $this->requestDispatcher->dispatch($request);
    }

    /**
     * @throws RequestDispatcherException
     */
    public function updateOrderReferenceId(UpdateReferenceIdRequest $request): UpdateReferenceIdResponse
    {
        return $this->requestDispatcher->dispatch($request);
    }

    /**
     * @throws RequestDispatcherException
     */
    public function getOrderByReferenceId(GetOrderByReferenceIdRequest $request): GetOrderByReferenceIdResponse
    {
        return $this->requestDispatcher->dispatch($request);
    }

    /**
     * Get order details by tamara order id
     *
     *
     * @throws RequestDispatcherException
     */
    public function getOrder(GetOrderRequest $request): GetOrderResponse
    {
        return $this->requestDispatcher->dispatch($request);
    }
}
