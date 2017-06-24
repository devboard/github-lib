<?php

declare(strict_types=1);

namespace Devboard\GitHub\Account;

/**
 * @see GitHubAccountGravatarIdSpec
 * @see GitHubAccountGravatarIdTest
 */
class GitHubAccountGravatarId
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
