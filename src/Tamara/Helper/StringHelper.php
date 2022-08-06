<?php

declare(strict_types=1);

namespace AlazziAz\Tamara\Tamara\Helper;

class StringHelper
{
    public static function camelize(string $input, string $separator = '_'): string
    {
        return str_replace($separator, '', ucwords($input, $separator));
    }
}
