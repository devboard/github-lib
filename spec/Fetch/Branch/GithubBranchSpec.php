<?php

declare(strict_types=1);

namespace spec\Devboard\Github\Fetch\Branch;

use Devboard\Github\Branch\GithubBranchName as BranchName;
use Devboard\Github\Fetch\Branch\GithubBranch;
use Devboard\Github\Fetch\Commit\GithubCommit as Commit;
use Devboard\Github\Repo\GithubRepoFullName as RepoFullName;
use PhpSpec\ObjectBehavior;

class GithubBranchSpec extends ObjectBehavior
{
    public function let(RepoFullName $repoFullName, BranchName $branchName, Commit $commit)
    {
        $this->beConstructedWith($repoFullName, $branchName, $commit);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(GithubBranch::class);
    }

    public function it_exposes_constructor_arguments(RepoFullName $repoFullName, BranchName $branchName, Commit $commit)
    {
        $this->getRepoFullName()->shouldReturn($repoFullName);
        $this->getBranchName()->shouldReturn($branchName);
        $this->getCommit()->shouldReturn($commit);
    }
}
