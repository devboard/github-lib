<?php

declare(strict_types=1);

namespace spec\Devboard\GitHub\Account;

use Devboard\GitHub\Account\GitHubAccountHtmlUrl;
use PhpSpec\ObjectBehavior;

class GitHubAccountHtmlUrlSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith('https://github.com/devboard-test');
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(GitHubAccountHtmlUrl::class);
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
