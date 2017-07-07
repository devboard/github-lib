<?php

declare(strict_types=1);

namespace spec\DevboardLib\GitHub\Installation;

use DevboardLib\GitHub\Installation\GitHubInstallationId;
use PhpSpec\ObjectBehavior;

class GitHubInstallationIdSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith(9001);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(GitHubInstallationId::class);
    }

    public function it_should_expose_value()
    {
        $this->getValue()->shouldReturn(9001);
    }

    public function it_should_be_castable_to_string()
    {
        $this->__toString()->shouldReturn('9001');
    }
}
