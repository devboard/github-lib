<?php

declare(strict_types=1);

namespace Devboard\GitHub\Repo;

/**
 * @see GitHubRepoTimestampsSpec
 * @see GitHubRepoTimestampsTest
 */
class GitHubRepoTimestamps
{
    /** @var GitHubRepoCreatedAt */
    private $createdAt;
    /** @var GitHubRepoUpdatedAt */
    private $updatedAt;
    /** @var GitHubRepoPushedAt */
    private $pushedAt;

    public function __construct(GitHubRepoCreatedAt $createdAt, GitHubRepoUpdatedAt $updatedAt, GitHubRepoPushedAt $pushedAt)
    {
        $this->createdAt = $createdAt;
        $this->updatedAt = $updatedAt;
        $this->pushedAt  = $pushedAt;
    }

    public function getCreatedAt(): GitHubRepoCreatedAt
    {
        return $this->createdAt;
    }

    public function getUpdatedAt(): GitHubRepoUpdatedAt
    {
        return $this->updatedAt;
    }

    public function getPushedAt(): GitHubRepoPushedAt
    {
        return $this->pushedAt;
    }
}
