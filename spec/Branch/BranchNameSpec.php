<?php

declare(strict_types=1);

namespace spec\DevboardLib\GitHub\Branch;

use DevboardLib\GitHub\Branch\BranchName;
use PhpSpec\ObjectBehavior;

class BranchNameSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith('master');
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(BranchName::class);
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
