<?php

declare(strict_types=1);

namespace spec\DevboardLib\GitHub\Commit;

use DevboardLib\GitHub\Commit\Committer\GitHubCommitCommitterEmail as CommitterEmail;
use DevboardLib\GitHub\Commit\Committer\GitHubCommitCommitterName as CommitterName;
use DevboardLib\GitHub\Commit\GitHubCommitCommitter;
use DevboardLib\GitHub\Commit\GitHubCommitCommitterDetails;
use DevboardLib\GitHub\Commit\GitHubCommitDate as CommitDate;
use PhpSpec\ObjectBehavior;

class GitHubCommitCommitterSpec extends ObjectBehavior
{
    public function let(
        CommitterName $committerName,
        CommitterEmail $committerEmail,
        CommitDate $commitDate,
        GitHubCommitCommitterDetails $committerDetails
    ) {
        $this->beConstructedWith(
            $committerName,
            $committerEmail,
            $commitDate,
            $committerDetails
        );
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(GitHubCommitCommitter::class);
    }

    public function it_exposes_contructor_arguments(
        CommitterName $committerName,
        CommitterEmail $committerEmail,
        CommitDate $commitDate,
        GitHubCommitCommitterDetails $committerDetails
    ) {
        $this->getName()->shouldReturn($committerName);
        $this->getEmail()->shouldReturn($committerEmail);
        $this->getCommitDate()->shouldReturn($commitDate);
        $this->getCommitterDetails()->shouldReturn($committerDetails);
    }
}
