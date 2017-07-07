<?php

declare(strict_types=1);

namespace spec\DevboardLib\GitHub\Repo;

use DevboardLib\GitHub\Repo\GitHubRepoCreatedAt as CreatedAt;
use DevboardLib\GitHub\Repo\GitHubRepoPushedAt as PushedAt;
use DevboardLib\GitHub\Repo\GitHubRepoTimestamps;
use DevboardLib\GitHub\Repo\GitHubRepoUpdatedAt as UpdatedAt;
use PhpSpec\ObjectBehavior;

class GitHubRepoTimestampsSpec extends ObjectBehavior
{
    public function let(CreatedAt $createdAt, UpdatedAt $updatedAt, PushedAt $pushedAt)
    {
        $this->beConstructedWith($createdAt, $updatedAt, $pushedAt);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(GitHubRepoTimestamps::class);
    }

    public function it_exposes_timestamps(CreatedAt $createdAt, UpdatedAt $updatedAt, PushedAt $pushedAt)
    {
        $this->getCreatedAt()->shouldReturn($createdAt);
        $this->getUpdatedAt()->shouldReturn($updatedAt);
        $this->getPushedAt()->shouldReturn($pushedAt);
    }
}
