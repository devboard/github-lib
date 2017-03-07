<?php

declare(strict_types=1);

namespace spec\Devboard\GitHub\Fetch\Branch;

use Devboard\GitHub\Fetch\Branch\GitHubBranchFactory;
use Devboard\GitHub\Fetch\Commit\GitHubCommitFactory;
use Devboard\GitHub\GitHubBranch;
use Devboard\GitHub\GitHubCommit;
use Devboard\GitHub\Repo\GitHubRepoFullName;
use PhpSpec\ObjectBehavior;

class GitHubBranchFactorySpec extends ObjectBehavior
{
    public function let(GitHubCommitFactory $commitFactory)
    {
        $this->beConstructedWith($commitFactory);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(GitHubBranchFactory::class);
    }

    public function it_will_create_branch_from_given_branch_data(
        GitHubRepoFullName $fullName,
        GitHubCommitFactory $commitFactory,
    GitHubCommit $commit
    ) {
        $data = [
            'name'   => 'master',
            'commit' => ['..'],
        ];

        $commitFactory->createFromBranchData($data)
            ->shouldBeCalled()
            ->willReturn($commit);

        $this->createFromBranchData($fullName, $data)->shouldReturnAnInstanceOf(GitHubBranch::class);
    }
}
