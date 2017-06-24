<?php

declare(strict_types=1);

namespace Devboard\GitHub\Account;

/**
 * @see \Devboard\GitHub\Account\Type\Organization
 * @see \Devboard\GitHub\Account\Type\Account
 */
interface GitHubAccountType
{
    public function isOrganization(): bool;

    public function isUser(): bool;

    public function getValue(): string;

    public function __toString(): string;
}
