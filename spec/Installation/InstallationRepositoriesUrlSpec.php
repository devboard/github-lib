<?php

declare(strict_types=1);

namespace spec\DevboardLib\GitHub\Installation;

use DevboardLib\GitHub\Installation\InstallationRepositoriesUrl;
use PhpSpec\ObjectBehavior;

class InstallationRepositoriesUrlSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith('https://api.github.com/installation/repositories');
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(InstallationRepositoriesUrl::class);
    }

    public function it_should_expose_value()
    {
        $this->getValue()->shouldReturn('https://api.github.com/installation/repositories');
    }

    public function it_should_be_castable_to_string()
    {
        $this->__toString()->shouldReturn('https://api.github.com/installation/repositories');
    }
}
