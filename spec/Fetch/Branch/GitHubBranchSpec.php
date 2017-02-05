<?php

declare(strict_types=1);

namespace spec\Devboard\GitHub\Fetch\Branch;

use Devboard\GitHub\Branch\GitHubBranchName as BranchName;
use Devboard\GitHub\Fetch\Branch\GitHubBranch;
use Devboard\GitHub\Fetch\Commit\GitHubCommit as Commit;
use Devboard\GitHub\Repo\GitHubRepoFullName as RepoFullName;
use PhpSpec\ObjectBehavior;

class GitHubBranchSpec extends ObjectBehavior
{
    public function let(RepoFullName $repoFullName, BranchName $branchName, Commit $commit)
    {
        $this->beConstructedWith($repoFullName, $branchName, $commit);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(GitHubBranch::class);
    }

    public function it_exposes_constructor_arguments(RepoFullName $repoFullName, BranchName $branchName, Commit $commit)
    {
        $this->getRepoFullName()->shouldReturn($repoFullName);
        $this->getBranchName()->shouldReturn($branchName);
        $this->getCommit()->shouldReturn($commit);
    }
}
