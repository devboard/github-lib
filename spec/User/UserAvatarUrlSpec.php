<?php

declare(strict_types=1);

namespace spec\DevboardLib\GitHub\User;

use DevboardLib\GitHub\User\UserAvatarUrl;
use PhpSpec\ObjectBehavior;

class UserAvatarUrlSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith('https://avatars.Usercontent.com/u/13507412?v=3');
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(UserAvatarUrl::class);
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
