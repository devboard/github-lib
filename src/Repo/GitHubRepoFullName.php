<?php

declare(strict_types=1);

namespace Devboard\GitHub\Repo;

use Devboard\GitHub\Account\GitHubAccountLogin;

/**
 * @see GitHubRepoFullNameSpec
 * @see GitHubRepoFullNameTest
 */
class GitHubRepoFullName
{
    /** @var GitHubAccountLogin */
    private $owner;
    /** @var \Devboard\GitHub\Repo\GitHubRepoName */
    private $repoName;

    public function __construct(GitHubAccountLogin $owner, GitHubRepoName $repoName)
    {
        $this->owner    = $owner;
        $this->repoName = $repoName;
    }

    public static function createFromString(string $fullName): GitHubRepoFullName
    {
        list($owner, $name) = explode('/', $fullName);

        return new self(new GitHubAccountLogin($owner), new GitHubRepoName($name));
    }

    public function getValue(): string
    {
        return $this->owner->getValue().'/'.$this->repoName->getValue();
    }

    public function __toString(): string
    {
        return $this->getValue();
    }

    public function getOwner(): GitHubAccountLogin
    {
        return $this->owner;
    }

    public function getRepoName(): GitHubRepoName
    {
        return $this->repoName;
    }
}
