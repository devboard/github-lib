<?php

declare(strict_types=1);

namespace spec\Devboard\Github\Repo;

use Devboard\Github\Repo\GithubRepoDescription;
use PhpSpec\ObjectBehavior;

class GithubRepoDescriptionSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith('Repository description');
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(GithubRepoDescription::class);
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
