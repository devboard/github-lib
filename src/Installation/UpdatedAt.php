<?php

declare(strict_types=1);

namespace Devboard\GitHub\Installation;

use DateTime;

/**
 * @see UpdatedAtSpec
 * @see UpdatedAtTest
 */
class UpdatedAt extends DateTime
{
    public function __toString(): string
    {
        return $this->format('c');
    }

    public static function createFromFormat($format, $time, $object = null): UpdatedAt
    {
        $date = parent::createFromFormat($format, $time, $object);

        return new self($date->format('c'));
    }
}
