<?php

declare(strict_types=1);

namespace Devboard\Github\User\Type;

use Devboard\Github\User\GithubUserType;

/**
 * @see OrganizationSpec
 * @see OrganizationTest
 */
class Organization implements GithubUserType
{
    const NAME = 'Organization';

    public function isOrganization(): bool
    {
        return true;
    }

    public function isUser(): bool
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
