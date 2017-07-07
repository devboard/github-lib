<?php

declare(strict_types=1);

namespace DevboardLib\GitHub\Repo;

use DevboardLib\GitHub\Account\AccountLogin;

/**
 * @see RepoFullNameSpec
 * @see RepoFullNameTest
 */
class RepoFullName
{
    /** @var AccountLogin */
    private $owner;
    /** @var \DevboardLib\GitHub\Repo\RepoName */
    private $repoName;

    public function __construct(AccountLogin $owner, RepoName $repoName)
    {
        $this->owner    = $owner;
        $this->repoName = $repoName;
    }

    public static function createFromString(string $fullName): RepoFullName
    {
        list($owner, $name) = explode('/', $fullName);

        return new self(new AccountLogin($owner), new RepoName($name));
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

    public function getRepoName(): RepoName
    {
        return $this->repoName;
    }
}
