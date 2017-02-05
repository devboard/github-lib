<?php

declare(strict_types=1);

namespace spec\Devboard\GitHub\Repo;

use Devboard\GitHub\Repo\GitHubRepoId;
use PhpSpec\ObjectBehavior;

class GitHubRepoIdSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith(1001234);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(GitHubRepoId::class);
    }

    public function it_should_expose_value()
    {
        $this->getValue()->shouldReturn(1001234);
    }

    public function it_should_be_castable_to_string()
    {
        $this->__toString()->shouldReturn('1001234');
    }
}
