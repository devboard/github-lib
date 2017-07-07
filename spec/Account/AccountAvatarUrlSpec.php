<?php

declare(strict_types=1);

namespace spec\DevboardLib\GitHub\Account;

use DevboardLib\GitHub\Account\AccountAvatarUrl;
use PhpSpec\ObjectBehavior;

class AccountAvatarUrlSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith('https://avatars.Usercontent.com/u/13507412?v=3');
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(AccountAvatarUrl::class);
    }

    public function it_should_expose_value()
    {
        $this->getValue()->shouldReturn('https://avatars.Usercontent.com/u/13507412?v=3');
    }

    public function it_should_be_castable_to_string()
    {
        $this->__toString()->shouldReturn('https://avatars.Usercontent.com/u/13507412?v=3');
    }
}
