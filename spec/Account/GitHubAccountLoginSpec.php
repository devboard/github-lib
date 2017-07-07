<?php

declare(strict_types=1);

namespace spec\DevboardLib\GitHub\Account;

use DevboardLib\GitHub\Account\GitHubAccountLogin;
use PhpSpec\ObjectBehavior;

class GitHubAccountLoginSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith('devboard-test');
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(GitHubAccountLogin::class);
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
