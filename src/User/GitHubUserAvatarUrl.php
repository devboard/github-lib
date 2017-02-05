<?php

declare(strict_types=1);

namespace Devboard\GitHub\User;

/**
 * @see GitHubUserAvatarUrlSpec
 * @see GitHubUserAvatarUrlTest
 */
class GitHubUserAvatarUrl
{
    /** @var string */
    private $value;

    public function __construct(string $value)
    {
        $this->value = $value;
    }

    public function getValue(): string
    {
        return $this->value;
    }

    public function __toString(): string
    {
        return $this->value;
    }
}
