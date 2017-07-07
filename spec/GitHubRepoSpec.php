<?php

declare(strict_types=1);

namespace spec\DevboardLib\GitHub;

use DevboardLib\GitHub\Account\AccountLogin;
use DevboardLib\GitHub\GitHubRepo;
use DevboardLib\GitHub\Repo\GitHubRepoEndpoints;
use DevboardLib\GitHub\Repo\GitHubRepoFullName;
use DevboardLib\GitHub\Repo\GitHubRepoId;
use DevboardLib\GitHub\Repo\GitHubRepoName;
use DevboardLib\GitHub\Repo\GitHubRepoOwner;
use DevboardLib\GitHub\Repo\GitHubRepoStats;
use DevboardLib\GitHub\Repo\GitHubRepoTimestamps;
use PhpSpec\ObjectBehavior;

class GitHubRepoSpec extends ObjectBehavior
{
    public function let(
        GitHubRepoId $id,
        GitHubRepoFullName $fullName,
        GitHubRepoOwner $ownerDetails,
        GitHubRepoEndpoints $endpoints,
        GitHubRepoTimestamps $timestamps,
        GitHubRepoStats $stats
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
        GitHubRepoId $id,
        GitHubRepoFullName $fullName,
        GitHubRepoOwner $ownerDetails,
        GitHubRepoEndpoints $endpoints,
        GitHubRepoTimestamps $timestamps,
        GitHubRepoStats $stats
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
        GitHubRepoFullName $fullName,
        AccountLogin $userLogin,
        GitHubRepoName $repoName
    ) {
        $fullName->getOwner()->shouldBeCalled()->willReturn($userLogin);
        $fullName->getRepoName()->shouldBeCalled()->willReturn($repoName);

        $this->getRepoName()->shouldReturn($repoName);
        $this->getOwnerLogin()->shouldReturn($userLogin);
    }
}
