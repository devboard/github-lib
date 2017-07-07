<?php

declare(strict_types=1);

namespace spec\DevboardLib\GitHub\User;

use DevboardLib\GitHub\User\UserEmailAddress;
use PhpSpec\ObjectBehavior;

class UserEmailAddressSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith('nobody@example.com');
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(UserEmailAddress::class);
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
