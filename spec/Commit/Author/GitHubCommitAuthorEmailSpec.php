<?php

declare(strict_types=1);

namespace spec\DevboardLib\GitHub\Commit\Author;

use DevboardLib\GitHub\Commit\Author\GitHubCommitAuthorEmail;
use PhpSpec\ObjectBehavior;

class GitHubCommitAuthorEmailSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith('nobody@example.com');
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(GitHubCommitAuthorEmail::class);
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
