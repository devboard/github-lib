<?php

declare(strict_types=1);

namespace spec\Devboard\Github\Repo;

use Devboard\Github\Repo\GithubRepoGitUrl;
use PhpSpec\ObjectBehavior;

class GithubRepoGitUrlSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith('git://github.com/devboard-test/super-library.git');
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(GithubRepoGitUrl::class);
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
