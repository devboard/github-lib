<?php

declare(strict_types=1);

namespace Devboard\Github\User;

/**
 * @see GithubUserGravatarIdSpec
 * @see GithubUserGravatarIdTest
 */
class GithubUserGravatarId
{
    /** @var string */
    private $id;

    public function __construct(string $id)
    {
        $this->id = $id;
    }

    public function getValue(): string
    {
        return $this->id;
    }

    public function __toString(): string
    {
        return $this->id;
    }
}
