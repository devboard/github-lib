<?php

declare(strict_types=1);

namespace spec\Devboard\Github\Repo;

use Devboard\Github\Repo\GithubRepoCreatedAt as CreatedAt;
use Devboard\Github\Repo\GithubRepoPushedAt as PushedAt;
use Devboard\Github\Repo\GithubRepoTimestamps;
use Devboard\Github\Repo\GithubRepoUpdatedAt as UpdatedAt;
use PhpSpec\ObjectBehavior;

class GithubRepoTimestampsSpec extends ObjectBehavior
{
    public function let(CreatedAt $createdAt, UpdatedAt $updatedAt, PushedAt $pushedAt)
    {
        $this->beConstructedWith($createdAt, $updatedAt, $pushedAt);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(GithubRepoTimestamps::class);
    }

    public function it_exposes_timestamps(CreatedAt $createdAt, UpdatedAt $updatedAt, PushedAt $pushedAt)
    {
        $this->getCreatedAt()->shouldReturn($createdAt);
        $this->getUpdatedAt()->shouldReturn($updatedAt);
        $this->getPushedAt()->shouldReturn($pushedAt);
    }
}
