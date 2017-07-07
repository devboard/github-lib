<?php

declare(strict_types=1);

namespace spec\DevboardLib\GitHub\Repo;

use DevboardLib\GitHub\Repo\RepoDescription;
use PhpSpec\ObjectBehavior;

class RepoDescriptionSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith('Repository description');
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(RepoDescription::class);
    }

    public function it_should_expose_value()
    {
        $this->getValue()->shouldReturn('Repository description');
    }

    public function it_should_be_castable_to_string()
    {
        $this->__toString()->shouldReturn('Repository description');
    }
}
