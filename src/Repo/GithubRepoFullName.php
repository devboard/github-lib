<?php

declare(strict_types=1);

namespace Devboard\Github\Repo;

use Devboard\Github\User\GithubUserLogin;

/**
 * @see GithubRepoFullNameSpec
 * @see GithubRepoFullNameTest
 */
class GithubRepoFullName
{
    /** @var GithubUserLogin */
    private $owner;
    /** @var \Devboard\Github\Repo\GithubRepoName */
    private $repoName;

    public function __construct(GithubUserLogin $owner, GithubRepoName $repoName)
    {
        $this->owner    = $owner;
        $this->repoName = $repoName;
    }

    public static function createFromString(string $fullName): GithubRepoFullName
    {
        list($owner, $name) = explode('/', $fullName);

        return new self(new GithubUserLogin($owner), new GithubRepoName($name));
    }

    public function getValue(): string
    {
        return $this->owner->getValue().'/'.$this->repoName->getValue();
    }

    public function __toString(): string
    {
        return $this->getValue();
    }

    public function getOwner(): GithubUserLogin
    {
        return $this->owner;
    }

    public function getRepoName(): GithubRepoName
    {
        return $this->repoName;
    }
}
