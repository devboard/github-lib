<?php

declare(strict_types=1);

namespace spec\Devboard\Github\Branch;

use Devboard\Github\Branch\GithubBranchName;
use PhpSpec\ObjectBehavior;

class GithubBranchNameSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith('master');
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(GithubBranchName::class);
    }

    public function it_will_expose_value()
    {
        $this->getValue()->shouldReturn('master');
    }

    public function it_should_be_castable_to_string()
    {
        $this->__toString()->shouldReturn('master');
    }
}
