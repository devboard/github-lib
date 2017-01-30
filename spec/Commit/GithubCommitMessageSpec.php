<?php

declare(strict_types=1);

namespace spec\Devboard\Github\Commit;

use Devboard\Github\Commit\GithubCommitMessage;
use PhpSpec\ObjectBehavior;

class GithubCommitMessageSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith('Commit message');
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(GithubCommitMessage::class);
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
