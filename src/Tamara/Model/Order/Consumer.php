<?php

declare(strict_types=1);

namespace AlazziAz\Tamara\Tamara\Model\Order;

class Consumer
{
    public const
        FIRST_NAME = 'first_name';

    public const
        LAST_NAME = 'last_name';

    public const
        EMAIL = 'email';

    public const
        PHONE_NUMBER = 'phone_number';

    public const
        NATIONAL_ID = 'national_id';

    public const
        DATE_OF_BIRTH = 'date_of_birth';

    public const
        IS_FIRST_ORDER = 'is_first_order';

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
    private $phoneNumber;

    /**
     * @var string
     */
    private $email;

    /**
     * @var string|null
     */
    private $nationalId;

    /**
     * @var string|null
     */
    private $dateOfBirth;

    /**
     * @var bool|null
     */
    private $isFirstOrder;

    public static function fromArray(array $data): Consumer
    {
        $self = new self();
        $self->setFirstName($data[self::FIRST_NAME]);
        $self->setLastName($data[self::LAST_NAME]);
        $self->setPhoneNumber($data[self::PHONE_NUMBER]);
        $self->setEmail($data[self::EMAIL]);
        $self->setNationalId($data[self::NATIONAL_ID] ?? '');
        $self->setDateOfBirth($data[self::DATE_OF_BIRTH] ?? '');
        $self->setIsFirstOrder((bool) $data[self::IS_FIRST_ORDER]);

        return $self;
    }

    public function setFirstName(string $firstName): Consumer
    {
        $this->firstName = $firstName;

        return $this;
    }

    public function setLastName(string $lastName): Consumer
    {
        $this->lastName = $lastName;

        return $this;
    }

    public function setPhoneNumber(string $phoneNumber): Consumer
    {
        $this->phoneNumber = $phoneNumber;

        return $this;
    }

    public function setEmail(string $email): Consumer
    {
        $this->email = $email;

        return $this;
    }

    public function setNationalId(string $nationalId): Consumer
    {
        $this->nationalId = $nationalId;

        return $this;
    }

    public function setDateOfBirth(string $dateOfBirth): Consumer
    {
        $this->dateOfBirth = $dateOfBirth;

        return $this;
    }

    public function setIsFirstOrder(bool $isFirstOrder): Consumer
    {
        $this->isFirstOrder = $isFirstOrder;

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

    public function getPhoneNumber(): string
    {
        return $this->phoneNumber;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getNationalId(): string
    {
        return $this->nationalId ?? '';
    }

    public function getDateOfBirth(): string
    {
        return $this->dateOfBirth ?? '';
    }

    public function getIsFirstOrder(): bool
    {
        return $this->isFirstOrder ?? false;
    }

    public function toArray(): array
    {
        return [
            self::FIRST_NAME => $this->getFirstName(),
            self::LAST_NAME => $this->getLastName(),
            self::EMAIL => $this->getEmail(),
            self::PHONE_NUMBER => $this->getPhoneNumber(),
            self::NATIONAL_ID => $this->getNationalId(),
            self::DATE_OF_BIRTH => $this->getDateOfBirth(),
            self::IS_FIRST_ORDER => $this->getIsFirstOrder(),
        ];
    }
}
