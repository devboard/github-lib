<?php

declare(strict_types=1);

namespace DevboardLib\GitHub\Account;

use Exception;

/**
 * @see AccountTypeFactoryExceptionSpec
 * @see AccountTypeFactoryExceptionTest
 */
class AccountTypeFactoryException extends Exception
{
    public static function create(string $name): AccountTypeFactoryException
    {
        $message = 'Unknown AccountType with name: '.$name;

        return new self($message);
    }
}
