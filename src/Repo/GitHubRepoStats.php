<?php

declare(strict_types=1);

namespace Devboard\GitHub\Repo;

/**
 * @see GitHubRepoStatsSpec
 * @see GitHubRepoStatsTest
 */
class GitHubRepoStats
{
    /** @var int */
    private $networkCount;
    /** @var int */
    private $watchersCount;
    /** @var int */
    private $stargazersCount;
    /** @var int */
    private $openIssueCount;
    /** @var GitHubRepoSize */
    private $repoSize;

    public function __construct(
        int $networkCount,
        int $watchersCount,
        int $stargazersCount,
        int $openIssueCount,
        GitHubRepoSize $repoSize
    ) {
        $this->networkCount    = $networkCount;
        $this->watchersCount   = $watchersCount;
        $this->stargazersCount = $stargazersCount;
        $this->openIssueCount  = $openIssueCount;
        $this->repoSize        = $repoSize;
    }

    public function getNetworkCount(): int
    {
        return $this->networkCount;
    }

    public function getWatchersCount(): int
    {
        return $this->watchersCount;
    }

    public function getStargazersCount(): int
    {
        return $this->stargazersCount;
    }

    public function getOpenIssueCount(): int
    {
        return $this->openIssueCount;
    }

    public function getRepoSize(): GitHubRepoSize
    {
        return $this->repoSize;
    }

    public function serialize(): array
    {
        return [
            'networkCount'    => $this->networkCount,
            'watchersCount'   => $this->watchersCount,
            'stargazersCount' => $this->stargazersCount,
            'openIssueCount'  => $this->openIssueCount,
            'repoSize'        => $this->repoSize->getValue(),
        ];
    }

    public static function deserialize(array $data): GitHubRepoStats
    {
        return new self(
            $data['networkCount'],
            $data['watchersCount'],
            $data['stargazersCount'],
            $data['openIssueCount'],
            new GitHubRepoSize($data['repoSize'])
        );
    }
}
