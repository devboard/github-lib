<?php

declare(strict_types=1);

namespace DevboardLib\GitHub\Installation\RepositorySelection;

use DevboardLib\GitHub\Installation\RepositorySelection;

/**
 * @see GitHubInstallationRepositoryAllSpec
 * @see GitHubInstallationRepositoryAllTest
 */
class GitHubInstallationRepositoryAll implements RepositorySelection
{
    const NAME = 'all';

    public function all(): bool
    {
        return true;
    }

    public function selectedOnly(): bool
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
