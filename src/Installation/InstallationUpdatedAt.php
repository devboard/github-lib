<?php

declare(strict_types=1);

namespace DevboardLib\GitHub\Installation;

use DateTime;

/**
 * @see InstallationUpdatedAtSpec
 * @see InstallationUpdatedAtTest
 */
class InstallationUpdatedAt extends DateTime
{
    public function __toString(): string
    {
        return $this->format('c');
    }

    public static function createFromFormat($format, $time, $object = null): InstallationUpdatedAt
    {
        $date = parent::createFromFormat($format, $time, $object);

        return new self($date->format('c'));
    }
}
