<?php

declare(strict_types=1);

namespace spec\Devboard\Github\Repo;

use Devboard\Github\Repo\GithubRepoForkCount;
use spec\Devboard\Github\StatsSpec;

class GithubRepoForkCountSpec extends StatsSpec
{
    public function it_is_initializable()
    {
        $this->shouldHaveType(GithubRepoForkCount::class);
    }
}
