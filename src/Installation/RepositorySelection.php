<?php

declare(strict_types=1);

namespace DevboardLib\GitHub\Installation;

/**
 * @see \DevboardLib\GitHub\Installation\RepositorySelection\GitHubInstallationRepositoryAll
 * @see \DevboardLib\GitHub\Installation\RepositorySelection\GitHubInstallationRepositorySelected
 */
interface RepositorySelection
{
    public function all(): bool;

    public function selectedOnly(): bool;

    public function getValue(): string;

    public function __toString(): string;
}
