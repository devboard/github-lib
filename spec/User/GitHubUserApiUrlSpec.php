<?php

declare(strict_types=1);

namespace spec\DevboardLib\GitHub\User;

use DevboardLib\GitHub\User\GitHubUserApiUrl;
use PhpSpec\ObjectBehavior;

class GitHubUserApiUrlSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith('https://api.github.com/users/devboard-test');
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(GitHubUserApiUrl::class);
    }

    public function it_should_expose_value()
    {
        $this->getValue()->shouldReturn('https://api.github.com/users/devboard-test');
    }

    public function it_should_be_castable_to_string()
    {
        $this->__toString()->shouldReturn('https://api.github.com/users/devboard-test');
    }
}
