<?php

declare(strict_types=1);

namespace spec\DevboardLib\GitHub\Commit\Committer;

use DevboardLib\GitHub\Commit\Committer\CommitCommitterEmail;
use PhpSpec\ObjectBehavior;

class CommitCommitterEmailSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith('nobody@example.com');
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(CommitCommitterEmail::class);
    }

    public function it_should_expose_value()
    {
        $this->getValue()->shouldReturn('nobody@example.com');
    }

    public function it_should_be_castable_to_string()
    {
        $this->__toString()->shouldReturn('nobody@example.com');
    }
}
