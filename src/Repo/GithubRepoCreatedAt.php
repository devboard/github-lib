<?php

declare(strict_types=1);

namespace Devboard\Github\Repo;

use DateTime;

/**
 * @see GithubRepoCreatedAtSpec
 * @see GithubRepoCreatedAtTest
 */
class GithubRepoCreatedAt extends DateTime
{
    public function __toString(): string
    {
        return $this->format('c');
    }

    public static function createFromFormat($format, $time, $object = null): GithubRepoCreatedAt
    {
        $date = parent::createFromFormat($format, $time, $object);

        return new self($date->format('c'));
    }
}
