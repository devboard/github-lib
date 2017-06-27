<?php

declare(strict_types=1);

namespace spec\Devboard\GitHub\Installation;

use Devboard\GitHub\Installation\GitHubInstallationHtmlUrl;
use PhpSpec\ObjectBehavior;

class GitHubInstallationHtmlUrlSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith('https://github.com/settings/installations/9001');
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(GitHubInstallationHtmlUrl::class);
    }

    public function it_should_expose_value()
    {
        $this->getValue()->shouldReturn('https://github.com/settings/installations/9001');
    }

    public function it_should_be_castable_to_string()
    {
        $this->__toString()->shouldReturn('https://github.com/settings/installations/9001');
    }
}
