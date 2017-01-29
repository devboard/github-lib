<?php

declare(strict_types=1);

namespace spec\Devboard\Github\Repo;

use Devboard\Github\Repo\GithubRepoApiUrl;
use PhpSpec\ObjectBehavior;

class GithubRepoApiUrlSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith('https://api.github.com/repos/devboard-test/super-library');
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(GithubRepoApiUrl::class);
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
