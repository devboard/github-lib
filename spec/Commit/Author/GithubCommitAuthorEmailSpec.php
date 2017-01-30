<?php

declare(strict_types=1);

namespace spec\Devboard\Github\Commit\Author;

use Devboard\Github\Commit\Author\GithubCommitAuthorEmail;
use PhpSpec\ObjectBehavior;

class GithubCommitAuthorEmailSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith('nobody@example.com');
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(GithubCommitAuthorEmail::class);
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
