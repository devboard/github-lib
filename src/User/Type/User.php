<?php

declare(strict_types=1);

namespace Devboard\GitHub\User\Type;

use Devboard\GitHub\User\GitHubUserType;

/**
 * @see UserSpec
 * @see UserTest
 */
class User implements GitHubUserType
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
