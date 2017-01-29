<?php

declare(strict_types=1);

namespace Devboard\Github\User;

/**
 * @see \Devboard\Github\User\Type\Organization
 * @see \Devboard\Github\User\Type\User
 */
interface GithubUserType
{
    public function isOrganization(): bool;

    public function isUser(): bool;

    public function getValue(): string;

    public function __toString(): string;
}
