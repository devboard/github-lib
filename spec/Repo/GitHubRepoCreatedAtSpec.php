<?php

declare(strict_types=1);

namespace spec\DevboardLib\GitHub\Repo;

use DateTime;
use DevboardLib\GitHub\Repo\GitHubRepoCreatedAt;
use PhpSpec\ObjectBehavior;

class GitHubRepoCreatedAtSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith('2011-01-01 00:11:22');
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(GitHubRepoCreatedAt::class);
        $this->shouldHaveType(DateTime::class);
    }

    public function it_should_be_castable_to_string()
    {
        $this->__toString()->shouldReturn('2011-01-01T00:11:22+00:00');
    }

    public function it_can_be_created_from_custom_format()
    {
        $result = $this->createFromFormat(DateTime::ATOM, '2012-02-02T11:22:33Z');
        $result->__toString()->shouldReturn('2012-02-02T11:22:33+00:00');
    }
}
