<?php

declare(strict_types=1);

namespace Devboard\Github\Repo;

use DateTime;

/**
 * @see GithubRepoPushedAtSpec
 * @see GithubRepoPushedAtTest
 */
class GithubRepoPushedAt extends DateTime
{
    public function __toString(): string
    {
        return $this->format('c');
    }

    public static function createFromFormat($format, $time, $object = null): GithubRepoPushedAt
    {
        $date = parent::createFromFormat($format, $time, $object);

        return new self($date->format('c'));
    }
}
