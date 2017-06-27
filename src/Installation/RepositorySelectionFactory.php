<?php

declare(strict_types=1);

namespace Devboard\GitHub\Installation;

use Devboard\GitHub\Installation\RepositorySelection\GitHubInstallationRepositoryAll;
use Devboard\GitHub\Installation\RepositorySelection\GitHubInstallationRepositorySelected;

/**
 * @see RepositorySelectionFactorySpec
 * @see RepositorySelectionFactoryTest
 */
class RepositorySelectionFactory
{
    public static function create(string $name): RepositorySelection
    {
        if (GitHubInstallationRepositoryAll::NAME === $name) {
            return new GitHubInstallationRepositoryAll();
        } elseif (GitHubInstallationRepositorySelected::NAME === $name) {
            return new GitHubInstallationRepositorySelected();
        }

        throw RepositorySelectionFactoryException::create($name);
    }
}
