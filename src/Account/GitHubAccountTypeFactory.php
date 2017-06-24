<?php

declare(strict_types=1);

namespace Devboard\GitHub\Account;

use Devboard\GitHub\Account\Type\Organization;
use Devboard\GitHub\Account\Type\User;

/**
 * @see GitHubAccountTypeFactorySpec
 * @see GitHubAccountTypeFactoryTest
 */
class GitHubAccountTypeFactory
{
    public static function create(string $name): GitHubAccountType
    {
        if (Organization::NAME === $name) {
            return new Organization();
        } elseif (User::NAME === $name) {
            return new User();
        }

        throw GitHubAccountTypeFactoryException::create($name);
    }
}
