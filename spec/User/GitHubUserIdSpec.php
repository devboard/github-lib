<?php

declare(strict_types=1);

namespace spec\DevboardLib\GitHub\User;

use DevboardLib\GitHub\User\GitHubUserId;
use PhpSpec\ObjectBehavior;

class GitHubUserIdSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith(200123);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(GitHubUserId::class);
    }

    public function it_should_expose_value()
    {
        $this->getValue()->shouldReturn(200123);
    }

    public function it_should_be_castable_to_string()
    {
        $this->__toString()->shouldReturn('200123');
    }
}
