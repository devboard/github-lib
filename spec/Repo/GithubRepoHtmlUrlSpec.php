<?php

declare(strict_types=1);

namespace spec\Devboard\Github\Repo;

use Devboard\Github\Repo\GithubRepoHtmlUrl;
use PhpSpec\ObjectBehavior;

class GithubRepoHtmlUrlSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith('https://github.com/devboard-test/super-library');
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(GithubRepoHtmlUrl::class);
    }

    public function it_should_expose_value()
    {
        $this->getValue()->shouldReturn('https://github.com/devboard-test/super-library');
    }

    public function it_should_be_castable_to_string()
    {
        $this->__toString()->shouldReturn('https://github.com/devboard-test/super-library');
    }
}
