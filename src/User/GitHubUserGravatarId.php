<?php

declare(strict_types=1);

namespace Devboard\GitHub\User;

/**
 * @see GitHubUserGravatarIdSpec
 * @see GitHubUserGravatarIdTest
 */
class GitHubUserGravatarId
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
