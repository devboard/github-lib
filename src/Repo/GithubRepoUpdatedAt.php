<?php

declare(strict_types=1);

namespace Devboard\Github\Repo;

use DateTime;

/**
 * @see GithubRepoUpdatedAtSpec
 * @see GithubRepoUpdatedAtTest
 */
class GithubRepoUpdatedAt extends DateTime
{
    public function __toString(): string
    {
        return $this->format('c');
    }

    public static function createFromFormat($format, $time, $object = null)
    {
        $date = parent::createFromFormat($format, $time, $object);

        return new self($date->format('c'));
    }
}
