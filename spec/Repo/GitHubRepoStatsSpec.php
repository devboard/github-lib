<?php

declare(strict_types=1);

namespace spec\DevboardLib\GitHub\Repo;

use DevboardLib\GitHub\Repo\GitHubRepoSize;
use DevboardLib\GitHub\Repo\GitHubRepoStats;
use PhpSpec\ObjectBehavior;

class GitHubRepoStatsSpec extends ObjectBehavior
{
    public function let(GitHubRepoSize $repoSize)
    {
        $this->beConstructedWith(1, 2, 3, 4, $repoSize);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(GitHubRepoStats::class);
    }

    public function it_exposes_counts(GitHubRepoSize $repoSize)
    {
        $this->getNetworkCount()->shouldReturn(1);
        $this->getWatchersCount()->shouldReturn(2);
        $this->getStargazersCount()->shouldReturn(3);
        $this->getOpenIssueCount()->shouldReturn(4);
        $this->getRepoSize()->shouldReturn($repoSize);
    }
}
