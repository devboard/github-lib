<?php

declare(strict_types=1);

namespace spec\Devboard\GitHub\Repo;

use Devboard\GitHub\Repo\GitHubRepoAccessPermissions;
use PhpSpec\ObjectBehavior;

class GitHubRepoAccessPermissionsSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith(true, true, true);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(GitHubRepoAccessPermissions::class);
    }

    public function it_will_expose_each_permission()
    {
        $this->isAdmin()->shouldReturn(true);
        $this->isPushAllowed()->shouldReturn(true);
        $this->isPullAllowed()->shouldReturn(true);
    }
}
