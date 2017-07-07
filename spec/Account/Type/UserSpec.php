<?php

declare(strict_types=1);

namespace spec\DevboardLib\GitHub\Account\Type;

use DevboardLib\GitHub\Account\Type\User;
use PhpSpec\ObjectBehavior;

class UserSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith();
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(User::class);
    }

    public function it_knows_it_is_user_and_not_organization()
    {
        $this->isOrganization()->shouldReturn(false);
        $this->isUser()->shouldReturn(true);
    }

    public function it_should_expose_value()
    {
        $this->getValue()->shouldReturn('User');
    }

    public function it_should_be_castable_to_string()
    {
        $this->__toString()->shouldReturn('User');
    }
}
