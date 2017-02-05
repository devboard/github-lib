<?php

declare(strict_types=1);

namespace Devboard\GitHub\User;

/**
 * @see \Devboard\GitHub\User\Type\Organization
 * @see \Devboard\GitHub\User\Type\User
 */
interface GitHubUserType
{
    public function isOrganization(): bool;

    public function isUser(): bool;

    public function getValue(): string;

    public function __toString(): string;
}
