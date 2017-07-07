<?php

declare(strict_types=1);

namespace spec\DevboardLib\GitHub\User;

use DevboardLib\GitHub\User\UserLogin;
use PhpSpec\ObjectBehavior;

class UserLoginSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith('devboard-test');
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(UserLogin::class);
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
