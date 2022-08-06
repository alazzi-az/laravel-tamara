<?php

declare(strict_types=1);

namespace AlazziAz\Tamara\Tamara\Model\Order;

class MerchantUrl
{
    public const
        SUCCESS = 'success';

    public const
        FAILURE = 'failure';

    public const
        CANCEL = 'cancel';

    public const
        NOTIFICATION = 'notification';

    /**
     * @var string
     */
    private $successUrl;

    /**
     * @var string
     */
    private $failureUrl;

    /**
     * @var string
     */
    private $cancelUrl;

    /**
     * @var string
     */
    private $notificationUrl;

    public function setSuccessUrl(string $successUrl): MerchantUrl
    {
        $this->successUrl = $successUrl;

        return $this;
    }

    public function setFailureUrl(string $failureUrl): MerchantUrl
    {
        $this->failureUrl = $failureUrl;

        return $this;
    }

    public function setCancelUrl(string $cancelUrl): MerchantUrl
    {
        $this->cancelUrl = $cancelUrl;

        return $this;
    }

    public function setNotificationUrl(string $notificationUrl): MerchantUrl
    {
        $this->notificationUrl = $notificationUrl;

        return $this;
    }

    public function getSuccessUrl(): string
    {
        return $this->successUrl;
    }

    public function getFailureUrl(): string
    {
        return $this->failureUrl;
    }

    public function getCancelUrl(): string
    {
        return $this->cancelUrl;
    }

    public function getNotificationUrl(): string
    {
        return $this->notificationUrl;
    }

    public function toArray(): array
    {
        return [
            self::SUCCESS => $this->getSuccessUrl(),
            self::FAILURE => $this->getFailureUrl(),
            self::CANCEL => $this->getCancelUrl(),
            self::NOTIFICATION => $this->getNotificationUrl(),
        ];
    }
}
