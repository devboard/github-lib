<?php

declare(strict_types=1);

namespace spec\Devboard\Github\Repo;

use Devboard\Github\Repo\GithubRepoSubscribersCount;
use spec\Devboard\Github\StatsSpec;

class GithubRepoSubscribersCountSpec extends StatsSpec
{
    public function it_is_initializable()
    {
        $this->shouldHaveType(GithubRepoSubscribersCount::class);
    }
}
