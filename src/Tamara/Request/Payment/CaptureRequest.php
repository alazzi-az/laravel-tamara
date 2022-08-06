<?php

declare(strict_types=1);

namespace AlazziAz\Tamara\Tamara\Request\Payment;

use AlazziAz\Tamara\Tamara\Model\Payment\Capture;

class CaptureRequest
{
    /**
     * @var Capture
     */
    private $capture;

    public function __construct(Capture $capture)
    {
        $this->capture = $capture;
    }

    public function getCapture(): Capture
    {
        return $this->capture;
    }
}
