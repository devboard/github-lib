<?php

declare(strict_types=1);

namespace Devboard\Github\User;

use Exception;

/**
 * @see GithubUserTypeFactoryExceptionSpec
 * @see GithubUserTypeFactoryExceptionTest
 */
class GithubUserTypeFactoryException extends Exception
{
    public static function create(string $name): GithubUserTypeFactoryException
    {
        $message = 'Unknown GithubUserType with name: '.$name;

        return new self($message);
    }
}
