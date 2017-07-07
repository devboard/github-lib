<?php

declare(strict_types=1);

namespace DevboardLib\GitHub\Repo;

use DevboardLib\GitHub\Account\AccountLogin;

/**
 * @see GitHubRepoFullNameSpec
 * @see GitHubRepoFullNameTest
 */
class GitHubRepoFullName
{
    /** @var AccountLogin */
    private $owner;
    /** @var \DevboardLib\GitHub\Repo\GitHubRepoName */
    private $repoName;

    public function __construct(AccountLogin $owner, GitHubRepoName $repoName)
    {
        $this->owner    = $owner;
        $this->repoName = $repoName;
    }

    public static function createFromString(string $fullName): GitHubRepoFullName
    {
        list($owner, $name) = explode('/', $fullName);

        return new self(new AccountLogin($owner), new GitHubRepoName($name));
    }

    public function getValue(): string
    {
        return $this->owner->getValue().'/'.$this->repoName->getValue();
    }

    public function __toString(): string
    {
        return $this->getValue();
    }

    public function getOwner(): AccountLogin
    {
        return $this->owner;
    }

    public function getRepoName(): GitHubRepoName
    {
        return $this->repoName;
    }
}
