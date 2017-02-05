<?php

declare(strict_types=1);

namespace Devboard\GitHub\User;

/**
 * @see GitHubUserIdSpec
 * @see GitHubUserIdTest
 */
class GitHubUserId
{
    /** @var int */
    private $id;

    public function __construct(int $id)
    {
        $this->id = $id;
    }

    public function getValue(): int
    {
        return $this->id;
    }

    public function __toString(): string
    {
        return (string) $this->id;
    }
}
