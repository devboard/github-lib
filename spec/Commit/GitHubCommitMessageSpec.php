<?php

declare(strict_types=1);

namespace spec\DevboardLib\GitHub\Commit;

use DevboardLib\GitHub\Commit\GitHubCommitMessage;
use PhpSpec\ObjectBehavior;

class GitHubCommitMessageSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith('Commit message');
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(GitHubCommitMessage::class);
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
