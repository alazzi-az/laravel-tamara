<?php

namespace AlazziAz\Tamara\Tamara\Model\Order;

class RiskAssessment
{
    /**
     * @var array
     */
    private $data;

    public function __construct(array $data = [])
    {
        $this->data = $data;
    }

    public function getData(): array
    {
        return $this->data;
    }
}
