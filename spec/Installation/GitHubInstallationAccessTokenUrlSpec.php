<?php

declare(strict_types=1);

namespace spec\DevboardLib\GitHub\Installation;

use DevboardLib\GitHub\Installation\GitHubInstallationAccessTokenUrl;
use PhpSpec\ObjectBehavior;

class GitHubInstallationAccessTokenUrlSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith('https://api.github.com/installations/9001/access_tokens');
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(GitHubInstallationAccessTokenUrl::class);
    }

    public function it_should_expose_value()
    {
        $this->getValue()->shouldReturn('https://api.github.com/installations/9001/access_tokens');
    }

    public function it_should_be_castable_to_string()
    {
        $this->__toString()->shouldReturn('https://api.github.com/installations/9001/access_tokens');
    }
}
