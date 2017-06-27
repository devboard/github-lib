<?php

declare(strict_types=1);

namespace Devboard\GitHub\Installation;

use Exception;

/**
 * @see RepositorySelectionFactoryExceptionSpec
 * @see RepositorySelectionFactoryExceptionTest
 */
class RepositorySelectionFactoryException extends Exception
{
    public static function create(string $name): RepositorySelectionFactoryException
    {
        $message = 'Unknown GitHubInstallationRepositorySelection with name: '.$name;

        return new self($message);
    }
}
