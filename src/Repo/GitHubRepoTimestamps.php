<?php

declare(strict_types=1);

namespace DevboardLib\GitHub\Repo;

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

    public function serialize(): array
    {
        return [
            'createdAt' => (string) $this->createdAt,
            'updatedAt' => (string) $this->updatedAt,
            'pushedAt'  => (string) $this->pushedAt,
        ];
    }

    public static function deserialize(array $data): GitHubRepoTimestamps
    {
        return new self(
            new GitHubRepoCreatedAt($data['createdAt']),
            new GitHubRepoUpdatedAt($data['updatedAt']),
            new GitHubRepoPushedAt($data['pushedAt'])
        );
    }
}
