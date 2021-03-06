<?php

declare(strict_types=1);

namespace spec\DevboardLib\GitHub\Commit\Committer;

use DevboardLib\GitHub\Commit\Committer\CommitCommitterName;
use PhpSpec\ObjectBehavior;

class CommitCommitterNameSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith('John Smith');
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(CommitCommitterName::class);
    }

    public function it_should_expose_value()
    {
        $this->getValue()->shouldReturn('John Smith');
    }

    public function it_should_be_castable_to_string()
    {
        $this->__toString()->shouldReturn('John Smith');
    }
}
