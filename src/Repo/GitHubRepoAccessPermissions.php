<?php

declare(strict_types=1);

namespace DevboardLib\GitHub\Repo;

/**
 * @see GitHubRepoAccessPermissionsSpec
 * @see GitHubRepoAccessPermissionsTest
 */
class GitHubRepoAccessPermissions
{
    /** @var bool */
    private $admin;
    /** @var bool */
    private $pushAllowed;
    /** @var bool */
    private $pullAllowed;

    public function __construct(bool $admin, bool $pushAllowed, bool $pullAllowed)
    {
        $this->admin       = $admin;
        $this->pushAllowed = $pushAllowed;
        $this->pullAllowed = $pullAllowed;
    }

    public function isAdmin(): bool
    {
        return $this->admin;
    }

    public function isPushAllowed(): bool
    {
        return $this->pushAllowed;
    }

    public function isPullAllowed(): bool
    {
        return $this->pullAllowed;
    }
}
