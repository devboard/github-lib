<?php

declare(strict_types=1);

namespace spec\Devboard\Github\Fetch\Repo;

use Devboard\Github\Fetch\Repo\GithubRepo;
use Devboard\Github\Repo\GithubRepoEndpoints;
use Devboard\Github\Repo\GithubRepoFullName;
use Devboard\Github\Repo\GithubRepoId;
use Devboard\Github\Repo\GithubRepoOwner;
use Devboard\Github\Repo\GithubRepoStats;
use Devboard\Github\Repo\GithubRepoTimestamps;
use PhpSpec\ObjectBehavior;

class GithubRepoSpec extends ObjectBehavior
{
    public function let(
        GithubRepoId $id,
        GithubRepoFullName $fullName,
        GithubRepoOwner $owner,
        GithubRepoEndpoints $endpoints,
        GithubRepoTimestamps $timestamps,
        GithubRepoStats $stats
    ) {
        $this->beConstructedWith(
            $id,
            $fullName,
            $owner,
            $private = false,
            $endpoints,
            $timestamps,
            $stats
        );
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(GithubRepo::class);
    }

    public function it_exposes_constructor_arguments(
        GithubRepoId $id,
        GithubRepoFullName $fullName,
        GithubRepoOwner $owner,
        GithubRepoEndpoints $endpoints,
        GithubRepoTimestamps $timestamps,
        GithubRepoStats $stats
    ) {
        $this->getId()->shouldReturn($id);
        $this->getFullName()->shouldReturn($fullName);
        $this->getOwner()->shouldReturn($owner);
        $this->isPrivate()->shouldReturn(false);
        $this->isPublic()->shouldReturn(true);
        $this->getEndpoints()->shouldReturn($endpoints);
        $this->getTimestamps()->shouldReturn($timestamps);
        $this->getStats()->shouldReturn($stats);
    }
}
