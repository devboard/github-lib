<?php

declare(strict_types=1);

namespace spec\Devboard\Github\Repo;

use Devboard\Github\Repo\GithubRepoStats;
use PhpSpec\ObjectBehavior;

class GithubRepoStatsSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith(1, 2, 3, 4);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(GithubRepoStats::class);
    }

    public function it_exposes_counts()
    {
        $this->getNetworkCount()->shouldReturn(1);
        $this->getWatchersCount()->shouldReturn(2);
        $this->getStargazersCount()->shouldReturn(3);
        $this->getOpenIssueCount()->shouldReturn(4);
    }
}
