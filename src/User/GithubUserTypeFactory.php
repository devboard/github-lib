<?php

declare(strict_types=1);

namespace Devboard\Github\User;

use Devboard\Github\User\Type\Organization;
use Devboard\Github\User\Type\User;

/**
 * @see GithubUserTypeFactorySpec
 * @see GithubUserTypeFactoryTest
 */
class GithubUserTypeFactory
{
    public static function create(string $name): GithubUserType
    {
        if (Organization::NAME === $name) {
            return new Organization();
        } elseif (User::NAME === $name) {
            return new User();
        }

        throw GithubUserTypeFactoryException::create($name);
    }
}
