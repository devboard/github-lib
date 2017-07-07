<?php

declare(strict_types=1);

namespace DevboardLib\GitHub\Installation;

/**
 * @see GitHubInstallationIdSpec
 * @see GitHubInstallationIdTest
 */
class GitHubInstallationId
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
