<?php

declare(strict_types=1);

namespace spec\DevboardLib\GitHub\Repo;

use DevboardLib\GitHub\Repo\RepoSize;
use DevboardLib\GitHub\Repo\RepoStats;
use PhpSpec\ObjectBehavior;

class RepoStatsSpec extends ObjectBehavior
{
    public function let(RepoSize $repoSize)
    {
        $this->beConstructedWith(1, 2, 3, 4, $repoSize);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(RepoStats::class);
    }

    public function it_exposes_counts(RepoSize $repoSize)
    {
        $this->getNetworkCount()->shouldReturn(1);
        $this->getWatchersCount()->shouldReturn(2);
        $this->getStargazersCount()->shouldReturn(3);
        $this->getOpenIssueCount()->shouldReturn(4);
        $this->getRepoSize()->shouldReturn($repoSize);
    }
}
