<?php

declare(strict_types=1);

namespace spec\Devboard\Github\User;

use Devboard\Github\User\GithubUserAvatarUrl;
use PhpSpec\ObjectBehavior;

class GithubUserAvatarUrlSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith('https://avatars.githubusercontent.com/u/13507412?v=3');
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(GithubUserAvatarUrl::class);
    }

    public function it_should_expose_value()
    {
        $this->getValue()->shouldReturn('https://avatars.githubusercontent.com/u/13507412?v=3');
    }

    public function it_should_be_castable_to_string()
    {
        $this->__toString()->shouldReturn('https://avatars.githubusercontent.com/u/13507412?v=3');
    }
}
