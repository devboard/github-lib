<?php

declare(strict_types=1);

namespace spec\DevboardLib\GitHub\Repo;

use DevboardLib\GitHub\Repo\RepoCreatedAt as CreatedAt;
use DevboardLib\GitHub\Repo\RepoPushedAt as PushedAt;
use DevboardLib\GitHub\Repo\RepoTimestamps;
use DevboardLib\GitHub\Repo\RepoUpdatedAt as UpdatedAt;
use PhpSpec\ObjectBehavior;

class RepoTimestampsSpec extends ObjectBehavior
{
    public function let(CreatedAt $createdAt, UpdatedAt $updatedAt, PushedAt $pushedAt)
    {
        $this->beConstructedWith($createdAt, $updatedAt, $pushedAt);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(RepoTimestamps::class);
    }

    public function it_exposes_timestamps(CreatedAt $createdAt, UpdatedAt $updatedAt, PushedAt $pushedAt)
    {
        $this->getCreatedAt()->shouldReturn($createdAt);
        $this->getUpdatedAt()->shouldReturn($updatedAt);
        $this->getPushedAt()->shouldReturn($pushedAt);
    }
}
