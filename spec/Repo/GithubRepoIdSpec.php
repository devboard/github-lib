<?php

declare(strict_types=1);

namespace spec\Devboard\Github\Repo;

use Devboard\Github\Repo\GithubRepoId;
use PhpSpec\ObjectBehavior;

class GithubRepoIdSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith(1001234);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(GithubRepoId::class);
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
