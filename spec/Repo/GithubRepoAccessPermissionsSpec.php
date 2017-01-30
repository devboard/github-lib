<?php

declare(strict_types=1);

namespace spec\Devboard\Github\Repo;

use Devboard\Github\Repo\GithubRepoAccessPermissions;
use PhpSpec\ObjectBehavior;

class GithubRepoAccessPermissionsSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith(true, true, true);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(GithubRepoAccessPermissions::class);
    }

    public function it_will_expose_each_permission()
    {
        $this->isAdmin()->shouldReturn(true);
        $this->isPushAllowed()->shouldReturn(true);
        $this->isPullAllowed()->shouldReturn(true);
    }
}
