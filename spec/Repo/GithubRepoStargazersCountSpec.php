<?php

declare(strict_types=1);

namespace spec\Devboard\Github\Repo;

use Devboard\Github\Repo\GithubRepoStargazersCount;
use spec\Devboard\Github\StatsSpec;

class GithubRepoStargazersCountSpec extends StatsSpec
{
    public function it_is_initializable()
    {
        $this->shouldHaveType(GithubRepoStargazersCount::class);
    }
}
