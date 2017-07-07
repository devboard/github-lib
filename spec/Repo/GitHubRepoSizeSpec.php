<?php

declare(strict_types=1);

namespace spec\DevboardLib\GitHub\Repo;

use DevboardLib\GitHub\Repo\GitHubRepoSize;
use spec\DevboardLib\GitHub\StatsSpec;

class GitHubRepoSizeSpec extends StatsSpec
{
    public function it_is_initializable()
    {
        $this->shouldHaveType(GitHubRepoSize::class);
    }
}
