<?php

declare(strict_types=1);

namespace DevboardLib\GitHub\Account;

use DevboardLib\GitHub\Account\Type\Organization;
use DevboardLib\GitHub\Account\Type\User;

/**
 * @see AccountTypeFactorySpec
 * @see AccountTypeFactoryTest
 */
class AccountTypeFactory
{
    public static function create(string $name): AccountType
    {
        if (Organization::NAME === $name) {
            return new Organization();
        } elseif (User::NAME === $name) {
            return new User();
        }

        throw AccountTypeFactoryException::create($name);
    }
}
