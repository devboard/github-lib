<?php

declare(strict_types=1);

namespace spec\Devboard\GitHub\Commit\Committer;

use Devboard\GitHub\Commit\Committer\GitHubCommitCommitterEmail;
use PhpSpec\ObjectBehavior;

class GitHubCommitCommitterEmailSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith('nobody@example.com');
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(GitHubCommitCommitterEmail::class);
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
