<?php

declare(strict_types=1);

namespace DevboardLib\GitHub\Account\Type;

use DevboardLib\GitHub\Account\AccountType;

/**
 * @see UserSpec
 * @see UserTest
 */
class User implements AccountType
{
    const NAME = 'User';

    public function isOrganization(): bool
    {
        return false;
    }

    public function isUser(): bool
    {
        return true;
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
