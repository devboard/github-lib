<?php

declare(strict_types=1);

namespace spec\Devboard\Github\Repo;

use Devboard\Github\Repo\GithubRepoNetworkCount;
use spec\Devboard\Github\StatsSpec;

class GithubRepoNetworkCountSpec extends StatsSpec
{
    public function it_is_initializable()
    {
        $this->shouldHaveType(GithubRepoNetworkCount::class);
    }
}
