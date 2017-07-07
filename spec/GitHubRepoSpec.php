<?php

declare(strict_types=1);

namespace spec\DevboardLib\GitHub;

use DevboardLib\GitHub\Account\AccountLogin;
use DevboardLib\GitHub\GitHubRepo;
use DevboardLib\GitHub\Repo\RepoEndpoints;
use DevboardLib\GitHub\Repo\RepoFullName;
use DevboardLib\GitHub\Repo\RepoId;
use DevboardLib\GitHub\Repo\RepoName;
use DevboardLib\GitHub\Repo\RepoOwner;
use DevboardLib\GitHub\Repo\RepoStats;
use DevboardLib\GitHub\Repo\RepoTimestamps;
use PhpSpec\ObjectBehavior;

class GitHubRepoSpec extends ObjectBehavior
{
    public function let(
        RepoId $id,
        RepoFullName $fullName,
        RepoOwner $ownerDetails,
        RepoEndpoints $endpoints,
        RepoTimestamps $timestamps,
        RepoStats $stats
    ) {
        $this->beConstructedWith(
            $id,
            $fullName,
            $ownerDetails,
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
        RepoId $id,
        RepoFullName $fullName,
        RepoOwner $ownerDetails,
        RepoEndpoints $endpoints,
        RepoTimestamps $timestamps,
        RepoStats $stats
    ) {
        $this->getId()->shouldReturn($id);
        $this->getFullName()->shouldReturn($fullName);
        $this->getOwnerDetails()->shouldReturn($ownerDetails);
        $this->isPrivate()->shouldReturn(false);
        $this->isPublic()->shouldReturn(true);
        $this->getEndpoints()->shouldReturn($endpoints);
        $this->getTimestamps()->shouldReturn($timestamps);
        $this->getStats()->shouldReturn($stats);
    }

    public function it_exposes_parts_of_full_name(
        RepoFullName $fullName,
        AccountLogin $userLogin,
        RepoName $repoName
    ) {
        $fullName->getOwner()->shouldBeCalled()->willReturn($userLogin);
        $fullName->getRepoName()->shouldBeCalled()->willReturn($repoName);

        $this->getRepoName()->shouldReturn($repoName);
        $this->getOwnerLogin()->shouldReturn($userLogin);
    }
}
