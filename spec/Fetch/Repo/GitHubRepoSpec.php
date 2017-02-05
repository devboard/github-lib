<?php

declare(strict_types=1);

namespace spec\Devboard\GitHub\Fetch\Repo;

use Devboard\GitHub\Fetch\Repo\GitHubRepo;
use Devboard\GitHub\Repo\GitHubRepoEndpoints;
use Devboard\GitHub\Repo\GitHubRepoFullName;
use Devboard\GitHub\Repo\GitHubRepoId;
use Devboard\GitHub\Repo\GitHubRepoOwner;
use Devboard\GitHub\Repo\GitHubRepoStats;
use Devboard\GitHub\Repo\GitHubRepoTimestamps;
use PhpSpec\ObjectBehavior;

class GitHubRepoSpec extends ObjectBehavior
{
    public function let(
        GitHubRepoId $id,
        GitHubRepoFullName $fullName,
        GitHubRepoOwner $owner,
        GitHubRepoEndpoints $endpoints,
        GitHubRepoTimestamps $timestamps,
        GitHubRepoStats $stats
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
        $this->shouldHaveType(GitHubRepo::class);
    }

    public function it_exposes_constructor_arguments(
        GitHubRepoId $id,
        GitHubRepoFullName $fullName,
        GitHubRepoOwner $owner,
        GitHubRepoEndpoints $endpoints,
        GitHubRepoTimestamps $timestamps,
        GitHubRepoStats $stats
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
