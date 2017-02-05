<?php

declare(strict_types=1);

namespace spec\Devboard\GitHub\Repo;

use Devboard\GitHub\Repo\GitHubRepoGitUrl;
use PhpSpec\ObjectBehavior;

class GitHubRepoGitUrlSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith('git://github.com/devboard-test/super-library.git');
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(GitHubRepoGitUrl::class);
    }

    public function it_should_expose_value()
    {
        $this->getValue()->shouldReturn('git://github.com/devboard-test/super-library.git');
    }

    public function it_should_be_castable_to_string()
    {
        $this->__toString()->shouldReturn('git://github.com/devboard-test/super-library.git');
    }
}
