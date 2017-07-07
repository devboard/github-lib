<?php

declare(strict_types=1);

namespace DevboardLib\GitHub\Installation;

use DateTime;

/**
 * @see InstallationCreatedAtSpec
 * @see InstallationCreatedAtTest
 */
class InstallationCreatedAt extends DateTime
{
    public function __toString(): string
    {
        return $this->format('c');
    }

    public static function createFromFormat($format, $time, $object = null): InstallationCreatedAt
    {
        $date = parent::createFromFormat($format, $time, $object);

        return new self($date->format('c'));
    }
}
