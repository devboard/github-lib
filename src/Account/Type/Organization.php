<?php

declare(strict_types=1);

namespace DevboardLib\GitHub\Account\Type;

use DevboardLib\GitHub\Account\AccountType;

/**
 * @see OrganizationSpec
 * @see OrganizationTest
 */
class Organization implements AccountType
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
