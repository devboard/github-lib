<?php

declare(strict_types=1);

namespace DevboardLib\GitHub\Repo;

/**
 * @see RepoTimestampsSpec
 * @see RepoTimestampsTest
 */
class RepoTimestamps
{
    /** @var RepoCreatedAt */
    private $createdAt;
    /** @var RepoUpdatedAt */
    private $updatedAt;
    /** @var RepoPushedAt */
    private $pushedAt;

    public function __construct(RepoCreatedAt $createdAt, RepoUpdatedAt $updatedAt, RepoPushedAt $pushedAt)
    {
        $this->createdAt = $createdAt;
        $this->updatedAt = $updatedAt;
        $this->pushedAt  = $pushedAt;
    }

    public function getCreatedAt(): RepoCreatedAt
    {
        return $this->createdAt;
    }

    public function getUpdatedAt(): RepoUpdatedAt
    {
        return $this->updatedAt;
    }

    public function getPushedAt(): RepoPushedAt
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

    public static function deserialize(array $data): RepoTimestamps
    {
        return new self(
            new RepoCreatedAt($data['createdAt']),
            new RepoUpdatedAt($data['updatedAt']),
            new RepoPushedAt($data['pushedAt'])
        );
    }
}
