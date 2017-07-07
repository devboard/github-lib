<?php

declare(strict_types=1);

namespace spec\DevboardLib\GitHub\Account;

use DevboardLib\GitHub\Account\GitHubAccountGravatarId;
use PhpSpec\ObjectBehavior;

class GitHubAccountGravatarIdSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith('f9879d71855b5ff21e4963273a886bfc');
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(GitHubAccountGravatarId::class);
    }

    public function it_should_expose_value()
    {
        $this->getValue()->shouldReturn('f9879d71855b5ff21e4963273a886bfc');
    }

    public function it_should_be_castable_to_string()
    {
        $this->__toString()->shouldReturn('f9879d71855b5ff21e4963273a886bfc');
    }
}
