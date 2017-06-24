<?php

declare(strict_types=1);

namespace Devboard\GitHub\Account;

use Exception;

/**
 * @see GitHubAccountTypeFactoryExceptionSpec
 * @see GitHubAccountTypeFactoryExceptionTest
 */
class GitHubAccountTypeFactoryException extends Exception
{
    public static function create(string $name): GitHubAccountTypeFactoryException
    {
        $message = 'Unknown GitHubAccountType with name: '.$name;

        return new self($message);
    }
}
