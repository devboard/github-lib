<?php

declare(strict_types=1);

namespace spec\DevboardLib\GitHub\User;

use DevboardLib\GitHub\User\GitHubUserLogin;
use PhpSpec\ObjectBehavior;

class GitHubUserLoginSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith('devboard-test');
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(GitHubUserLogin::class);
    }

    public function it_should_expose_value()
    {
        $this->getValue()->shouldReturn('devboard-test');
    }

    public function it_should_be_castable_to_string()
    {
        $this->__toString()->shouldReturn('devboard-test');
    }
}
