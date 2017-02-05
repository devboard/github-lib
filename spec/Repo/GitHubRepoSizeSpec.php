<?php

declare(strict_types=1);

namespace spec\Devboard\GitHub\Repo;

use Devboard\GitHub\Repo\GitHubRepoSize;
use spec\Devboard\GitHub\StatsSpec;

class GitHubRepoSizeSpec extends StatsSpec
{
    public function it_is_initializable()
    {
        $this->shouldHaveType(GitHubRepoSize::class);
    }
}
