<?php

declare(strict_types=1);

namespace spec\Devboard\Github\User;

use Devboard\Github\User\GithubUserHtmlUrl;
use PhpSpec\ObjectBehavior;

class GithubUserHtmlUrlSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith('https://github.com/devboard-test');
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(GithubUserHtmlUrl::class);
    }

    public function it_should_expose_value()
    {
        $this->getValue()->shouldReturn('https://github.com/devboard-test');
    }

    public function it_should_be_castable_to_string()
    {
        $this->__toString()->shouldReturn('https://github.com/devboard-test');
    }
}
