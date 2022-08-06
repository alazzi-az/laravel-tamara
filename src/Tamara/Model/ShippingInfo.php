<?php

declare(strict_types=1);

namespace AlazziAz\Tamara\Tamara\Model;

use DateTimeImmutable;

class ShippingInfo
{
    public const
        SHIPPED_AT = 'shipped_at';

    public const
        SHIPPING_COMPANY = 'shipping_company';

    public const
        TRACKING_NUMBER = 'tracking_number';

    public const
        TRACKING_URL = 'tracking_url';

    /**
     * @var DateTimeImmutable
     */
    private $shippedAt;

    /**
     * @var string
     */
    private $shippingCompany;

    /**
     * @var string|null
     */
    private $trackingNumber;

    /**
     * @var string|null
     */
    private $trackingUrl;

    public function __construct(
        DateTimeImmutable $shippedAt,
        string $shippingCompany,
        ?string $trackingNumber = null,
        ?string $trackingUrl = null
    ) {
        $this->shippedAt = $shippedAt;
        $this->shippingCompany = $shippingCompany;
        $this->trackingNumber = $trackingNumber;
        $this->trackingUrl = $trackingUrl;
    }

    public static function fromArray(array $data): ShippingInfo
    {
        $self = new self(new DateTimeImmutable($data[self::SHIPPED_AT]), $data[self::SHIPPING_COMPANY]);
        $self->setTrackingNumber($data[self::TRACKING_NUMBER]);
        $self->setTrackingUrl($data[self::TRACKING_URL]);

        return $self;
    }

    public function setShippedAt(DateTimeImmutable $shippedAt): void
    {
        $this->shippedAt = $shippedAt;
    }

    public function setShippingCompany(string $shippingCompany): void
    {
        $this->shippingCompany = $shippingCompany;
    }

    public function setTrackingNumber(?string $trackingNumber): void
    {
        $this->trackingNumber = $trackingNumber;
    }

    public function setTrackingUrl(?string $trackingUrl): void
    {
        $this->trackingUrl = $trackingUrl;
    }

    public function getShippedAt(): DateTimeImmutable
    {
        return $this->shippedAt;
    }

    public function getShippingCompany(): string
    {
        return $this->shippingCompany;
    }

    public function getTrackingNumber(): ?string
    {
        return $this->trackingNumber;
    }

    public function getTrackingUrl(): ?string
    {
        return $this->trackingUrl;
    }

    public function toArray(): array
    {
        return [
            self::SHIPPED_AT => $this->getShippedAt()->format(\DateTime::ATOM),
            self::SHIPPING_COMPANY => $this->getShippingCompany(),
            self::TRACKING_NUMBER => $this->getTrackingNumber(),
            self::TRACKING_URL => $this->getTrackingUrl(),
        ];
    }
}
