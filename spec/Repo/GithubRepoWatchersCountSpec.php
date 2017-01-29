<?php

declare(strict_types=1);

namespace spec\Devboard\Github\Repo;

use Devboard\Github\Repo\GithubRepoWatchersCount;
use spec\Devboard\Github\StatsSpec;

class GithubRepoWatchersCountSpec extends StatsSpec
{
    public function it_is_initializable()
    {
        $this->shouldHaveType(GithubRepoWatchersCount::class);
    }
}
