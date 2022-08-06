<?php

declare(strict_types=1);

namespace AlazziAz\Tamara\Tamara\Model\Order;

class Address
{
    public const
        FIRST_NAME = 'first_name';

    public const
        LAST_NAME = 'last_name';

    public const
        LINE1 = 'line1';

    public const
        LINE2 = 'line2';

    public const
        REGION = 'region';

    public const
        POSTAL_CODE = 'postal_code';

    public const
        CITY = 'city';

    public const
        COUNTRY_CODE = 'country_code';

    public const
        PHONE_NUMBER = 'phone_number';

    /**
     * @var string
     */
    private $firstName;

    /**
     * @var string
     */
    private $lastName;

    /**
     * @var string
     */
    private $line1;

    /**
     * @var string|null
     */
    private $line2;

    /**
     * @var string
     */
    private $region;

    /**
     * @var string
     */
    private $postalCode;

    /**
     * @var string
     */
    private $city;

    /**
     * @var string
     */
    private $countryCode;

    /**
     * @var string|null
     */
    private $phoneNumber;

    public static function fromArray(array $data): Address
    {
        $self = new self();
        $self->setFirstName($data[self::FIRST_NAME]);
        $self->setLastName($data[self::LAST_NAME]);
        $self->setLine1($data[self::LINE1]);
        $self->setLine2($data[self::LINE2] ?? '');
        $self->setRegion($data[self::REGION] ?? '');
        $self->setPostalCode($data[self::POSTAL_CODE] ?? '');
        $self->setCity($data[self::CITY] ?? '');
        $self->setCountryCode($data[self::COUNTRY_CODE]);
        $self->setPhoneNumber($data[self::PHONE_NUMBER]);

        return $self;
    }

    public function setFirstName(string $firstName): Address
    {
        $this->firstName = $firstName;

        return $this;
    }

    public function setLastName(string $lastName): Address
    {
        $this->lastName = $lastName;

        return $this;
    }

    public function setLine1(string $line1): Address
    {
        $this->line1 = $line1;

        return $this;
    }

    public function setLine2(string $line2): Address
    {
        $this->line2 = $line2;

        return $this;
    }

    public function setRegion(?string $region): Address
    {
        $this->region = $region ?? '';

        return $this;
    }

    public function setPostalCode(?string $postalCode): Address
    {
        $this->postalCode = $postalCode ?? '';

        return $this;
    }

    public function setCity(string $city): Address
    {
        $this->city = $city;

        return $this;
    }

    public function setCountryCode(string $countryCode): Address
    {
        $this->countryCode = $countryCode;

        return $this;
    }

    public function setPhoneNumber(string $phoneNumber): Address
    {
        $this->phoneNumber = $phoneNumber;

        return $this;
    }

    public function getFirstName(): string
    {
        return $this->firstName;
    }

    public function getLastName(): string
    {
        return $this->lastName;
    }

    public function getLine1(): string
    {
        return $this->line1;
    }

    public function getLine2(): string
    {
        return $this->line2 ?? '';
    }

    public function getRegion(): string
    {
        return $this->region ?? '';
    }

    public function getPostalCode(): string
    {
        return $this->postalCode ?? '';
    }

    public function getCity(): string
    {
        return $this->city;
    }

    public function getCountryCode(): string
    {
        return $this->countryCode;
    }

    public function getPhoneNumber(): string
    {
        return $this->phoneNumber ?? '';
    }

    public function toArray(): array
    {
        return [
            self::FIRST_NAME => $this->getFirstName(),
            self::LAST_NAME => $this->getLastName(),
            self::LINE1 => $this->getLine1(),
            self::LINE2 => $this->getLine2(),
            self::REGION => $this->getRegion(),
            self::POSTAL_CODE => $this->getPostalCode(),
            self::CITY => $this->getCity(),
            self::COUNTRY_CODE => $this->getCountryCode(),
            self::PHONE_NUMBER => $this->getPhoneNumber(),
        ];
    }
}
