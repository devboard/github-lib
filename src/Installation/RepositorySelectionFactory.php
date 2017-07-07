<?php

declare(strict_types=1);

namespace DevboardLib\GitHub\Installation;

use DevboardLib\GitHub\Installation\RepositorySelection\GitHubInstallationRepositoryAll;
use DevboardLib\GitHub\Installation\RepositorySelection\GitHubInstallationRepositorySelected;

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
