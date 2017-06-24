<?php

declare(strict_types=1);

namespace spec\Devboard\GitHub\Account;

use Devboard\GitHub\Account\GitHubAccountApiUrl;
use PhpSpec\ObjectBehavior;

class GitHubAccountApiUrlSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith('https://api.github.com/users/devboard-test');
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(GitHubAccountApiUrl::class);
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
