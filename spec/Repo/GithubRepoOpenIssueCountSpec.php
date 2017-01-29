<?php

declare(strict_types=1);

namespace spec\Devboard\Github\Repo;

use Devboard\Github\Repo\GithubRepoOpenIssueCount;
use spec\Devboard\Github\StatsSpec;

class GithubRepoOpenIssueCountSpec extends StatsSpec
{
    public function it_is_initializable()
    {
        $this->shouldHaveType(GithubRepoOpenIssueCount::class);
    }
}
