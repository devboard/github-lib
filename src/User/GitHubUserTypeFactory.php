<?php

declare(strict_types=1);

namespace Devboard\GitHub\User;

use Devboard\GitHub\User\Type\Organization;
use Devboard\GitHub\User\Type\User;

/**
 * @see GitHubUserTypeFactorySpec
 * @see GitHubUserTypeFactoryTest
 */
class GitHubUserTypeFactory
{
    public static function create(string $name): GitHubUserType
    {
        if (Organization::NAME === $name) {
            return new Organization();
        } elseif (User::NAME === $name) {
            return new User();
        }

        throw GitHubUserTypeFactoryException::create($name);
    }
}
