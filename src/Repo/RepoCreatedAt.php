<?php

declare(strict_types=1);

namespace DevboardLib\GitHub\Repo;

use DateTime;

/**
 * @see RepoCreatedAtSpec
 * @see RepoCreatedAtTest
 */
class RepoCreatedAt extends DateTime
{
    public function __toString(): string
    {
        return $this->format('c');
    }

    public static function createFromFormat($format, $time, $object = null): RepoCreatedAt
    {
        $date = parent::createFromFormat($format, $time, $object);

        return new self($date->format('c'));
    }
}
