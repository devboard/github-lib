<?php

declare(strict_types=1);

namespace Devboard\GitHub\Account\Type;

use Devboard\GitHub\Account\GitHubAccountType;

/**
 * @see UserSpec
 * @see UserTest
 */
class User implements GitHubAccountType
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
