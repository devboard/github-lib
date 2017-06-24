<?php

declare(strict_types=1);

namespace Devboard\GitHub\User\Type;

use Devboard\GitHub\User\GitHubUserType;

/**
 * @deprecated
 * @see OrganizationSpec
 * @see OrganizationTest
 */
class Organization implements GitHubUserType
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
