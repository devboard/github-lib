<?php

declare(strict_types=1);

namespace spec\DevboardLib\GitHub\Repo;

use DevboardLib\GitHub\Repo\RepoSize;
use spec\DevboardLib\GitHub\StatsSpec;

class RepoSizeSpec extends StatsSpec
{
    public function it_is_initializable()
    {
        $this->shouldHaveType(RepoSize::class);
    }
}
