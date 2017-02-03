<?php

declare(strict_types=1);

namespace Devboard\Github\Repo;

/**
 * @see GithubRepoTimestampsSpec
 * @see GithubRepoTimestampsTest
 */
class GithubRepoTimestamps
{
    /** @var GithubRepoCreatedAt */
    private $createdAt;
    /** @var GithubRepoUpdatedAt */
    private $updatedAt;
    /** @var GithubRepoPushedAt */
    private $pushedAt;

    public function __construct(GithubRepoCreatedAt $createdAt, GithubRepoUpdatedAt $updatedAt, GithubRepoPushedAt $pushedAt)
    {
        $this->createdAt = $createdAt;
        $this->updatedAt = $updatedAt;
        $this->pushedAt  = $pushedAt;
    }

    public function getCreatedAt(): GithubRepoCreatedAt
    {
        return $this->createdAt;
    }

    public function getUpdatedAt(): GithubRepoUpdatedAt
    {
        return $this->updatedAt;
    }

    public function getPushedAt(): GithubRepoPushedAt
    {
        return $this->pushedAt;
    }
}
