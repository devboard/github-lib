<?php

declare(strict_types=1);

namespace Devboard\GitHub\User;

use Exception;

/**
 * @see GitHubUserTypeFactoryExceptionSpec
 * @see GitHubUserTypeFactoryExceptionTest
 */
class GitHubUserTypeFactoryException extends Exception
{
    public static function create(string $name): GitHubUserTypeFactoryException
    {
        $message = 'Unknown GitHubUserType with name: '.$name;

        return new self($message);
    }
}
