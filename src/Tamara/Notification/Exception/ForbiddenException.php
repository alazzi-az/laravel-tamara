<?php

declare(strict_types=1);

namespace AlazziAz\Tamara\Tamara\Notification\Exception;

class ForbiddenException extends NotificationException
{
    protected $code = 401;
}
