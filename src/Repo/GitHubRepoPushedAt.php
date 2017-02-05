<?php

declare(strict_types=1);

namespace Devboard\GitHub\Repo;

use DateTime;

/**
 * @see GitHubRepoPushedAtSpec
 * @see GitHubRepoPushedAtTest
 */
class GitHubRepoPushedAt extends DateTime
{
    public function __toString(): string
    {
        return $this->format('c');
    }

    public static function createFromFormat($format, $time, $object = null): GitHubRepoPushedAt
    {
        $date = parent::createFromFormat($format, $time, $object);

        return new self($date->format('c'));
    }
}
