<?php

declare(strict_types=1);

namespace spec\DevboardLib\GitHub\Repo;

use DevboardLib\GitHub\Repo\GitHubRepoHtmlUrl;
use PhpSpec\ObjectBehavior;

class GitHubRepoHtmlUrlSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith('https://github.com/devboard-test/super-library');
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(GitHubRepoHtmlUrl::class);
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
