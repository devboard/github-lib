<?php

declare(strict_types=1);

namespace spec\DevboardLib\GitHub\Commit;

use DevboardLib\GitHub\Commit\CommitMessage;
use PhpSpec\ObjectBehavior;

class CommitMessageSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith('Commit message');
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(CommitMessage::class);
    }

    public function it_should_expose_value()
    {
        $this->getValue()->shouldReturn('Commit message');
    }

    public function it_should_be_castable_to_string()
    {
        $this->__toString()->shouldReturn('Commit message');
    }
}
