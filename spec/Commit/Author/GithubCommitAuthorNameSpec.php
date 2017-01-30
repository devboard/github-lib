<?php

declare(strict_types=1);

namespace spec\Devboard\Github\Commit\Author;

use Devboard\Github\Commit\Author\GithubCommitAuthorName;
use PhpSpec\ObjectBehavior;

class GithubCommitAuthorNameSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith('John Smith');
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(GithubCommitAuthorName::class);
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
