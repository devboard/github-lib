<?php

declare(strict_types=1);

namespace DevboardLib\GitHub\Installation;

/**
 * @see \DevboardLib\GitHub\Installation\InstallationRepositorySelection\InstallationRepositoryAll
 * @see \DevboardLib\GitHub\Installation\InstallationRepositorySelection\InstallationRepositorySelected
 */
interface InstallationRepositorySelection
{
    public function all(): bool;

    public function selectedOnly(): bool;

    public function getValue(): string;

    public function __toString(): string;
}
