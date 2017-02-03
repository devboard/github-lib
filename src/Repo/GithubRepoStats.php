<?php

declare(strict_types=1);

namespace Devboard\Github\Repo;

/**
 * @see GithubRepoStatsSpec
 * @see GithubRepoStatsTest
 */
class GithubRepoStats
{
    /** @var int */
    private $networkCount;
    /** @var int */
    private $watchersCount;
    /** @var int */
    private $stargazersCount;
    /** @var int */
    private $openIssueCount;

    public function __construct(int $networkCount, int $watchersCount, int $stargazersCount, int $openIssueCount)
    {
        $this->networkCount    = $networkCount;
        $this->watchersCount   = $watchersCount;
        $this->stargazersCount = $stargazersCount;
        $this->openIssueCount  = $openIssueCount;
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
}
