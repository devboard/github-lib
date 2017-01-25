<?php

declare(strict_types=1);

namespace spec\Devboard\Github\Repo;

use Devboard\Github\Repo\GithubRepoName;
use PhpSpec\ObjectBehavior;

class GithubRepoNameSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith('super-library');
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(GithubRepoName::class);
    }

    public function it_should_expose_value()
    {
        $this->getValue()->shouldReturn('super-library');
    }

    public function it_should_be_castable_to_string()
    {
        $this->__toString()->shouldReturn('super-library');
    }
}
