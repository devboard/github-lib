<?php

declare(strict_types=1);

namespace Devboard\GitHub\Installation;

/**
 * @see \Devboard\GitHub\Installation\RepositorySelection\GitHubInstallationRepositoryAll
 * @see \Devboard\GitHub\Installation\RepositorySelection\GitHubInstallationRepositorySelected
 */
interface RepositorySelection
{
    public function all(): bool;

    public function selectedOnly(): bool;

    public function getValue(): string;

    public function __toString(): string;
}
