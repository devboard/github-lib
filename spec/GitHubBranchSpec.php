<?php

declare(strict_types=1);

namespace spec\DevboardLib\GitHub;

use DevboardLib\GitHub\Branch\BranchName;
use DevboardLib\GitHub\GitHubBranch;
use DevboardLib\GitHub\GitHubCommit;
use DevboardLib\GitHub\Repo\RepoFullName;
use PhpSpec\ObjectBehavior;

class GitHubBranchSpec extends ObjectBehavior
{
    public function let(RepoFullName $repoFullName, BranchName $branchName, GitHubCommit $commit)
    {
        $this->beConstructedWith($repoFullName, $branchName, $commit);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(GitHubBranch::class);
    }

    public function it_exposes_constructor_arguments(RepoFullName $repoFullName, BranchName $branchName, GitHubCommit $commit)
    {
        $this->getRepoFullName()->shouldReturn($repoFullName);
        $this->getBranchName()->shouldReturn($branchName);
        $this->getCommit()->shouldReturn($commit);
    }
}
