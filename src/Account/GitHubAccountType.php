<?php

declare(strict_types=1);

namespace DevboardLib\GitHub\Account;

/**
 * @see \DevboardLib\GitHub\Account\Type\Organization
 * @see \DevboardLib\GitHub\Account\Type\Account
 */
interface GitHubAccountType
{
    public function isOrganization(): bool;

    public function isUser(): bool;

    public function getValue(): string;

    public function __toString(): string;
}
