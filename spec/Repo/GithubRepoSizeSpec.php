<?php

declare(strict_types=1);

namespace spec\Devboard\Github\Repo;

use Devboard\Github\Repo\GithubRepoSize;
use spec\Devboard\Github\StatsSpec;

class GithubRepoSizeSpec extends StatsSpec
{
    public function it_is_initializable()
    {
        $this->shouldHaveType(GithubRepoSize::class);
    }
}
