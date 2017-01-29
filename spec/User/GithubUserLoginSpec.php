<?php

declare(strict_types=1);

namespace spec\Devboard\Github\User;

use Devboard\Github\User\GithubUserLogin;
use PhpSpec\ObjectBehavior;

class GithubUserLoginSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith('devboard-test');
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(GithubUserLogin::class);
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
