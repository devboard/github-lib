<?php

declare(strict_types=1);

namespace DevboardLib\GitHub\Installation\RepositorySelection;

use DevboardLib\GitHub\Installation\RepositorySelection;

/**
 * @see GitHubInstallationRepositorySelectedSpec
 * @see GitHubInstallationRepositorySelectedTest
 */
class GitHubInstallationRepositorySelected implements RepositorySelection
{
    const NAME = 'selected';

    public function selectedOnly(): bool
    {
        return true;
    }

    public function all(): bool
    {
        return false;
    }

    public function getValue(): string
    {
        return self::NAME;
    }

    public function __toString(): string
    {
        return self::NAME;
    }
}
