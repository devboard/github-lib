<?php

declare(strict_types=1);

namespace spec\DevboardLib\GitHub\Repo;

use DevboardLib\GitHub\Repo\RepoId;
use PhpSpec\ObjectBehavior;

class RepoIdSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith(1001234);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(RepoId::class);
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
