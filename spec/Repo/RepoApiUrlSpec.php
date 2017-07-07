<?php

declare(strict_types=1);

namespace spec\DevboardLib\GitHub\Repo;

use DevboardLib\GitHub\Repo\RepoApiUrl;
use PhpSpec\ObjectBehavior;

class RepoApiUrlSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith('https://api.github.com/repos/devboard-test/super-library');
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(RepoApiUrl::class);
    }

    public function it_should_expose_value()
    {
        $this->getValue()->shouldReturn('https://api.github.com/repos/devboard-test/super-library');
    }

    public function it_should_be_castable_to_string()
    {
        $this->__toString()->shouldReturn('https://api.github.com/repos/devboard-test/super-library');
    }
}
