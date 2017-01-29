<?php

declare(strict_types=1);

namespace Devboard\Github\User\Type;

use Devboard\Github\User\GithubUserType;

/**
 * @see UserSpec
 * @see UserTest
 */
class User implements GithubUserType
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
