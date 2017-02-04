<?php

declare(strict_types=1);

namespace spec\Devboard\Github\Fetch\Commit;

use Devboard\Github\Commit\Committer\GithubCommitCommitterEmail as CommitterEmail;
use Devboard\Github\Commit\Committer\GithubCommitCommitterName as CommitterName;
use Devboard\Github\Commit\GithubCommitDate as CommitDate;
use Devboard\Github\Fetch\Commit\GithubCommitCommitter;
use Devboard\Github\Fetch\Commit\GithubCommitCommitterDetails;
use PhpSpec\ObjectBehavior;

class GithubCommitCommitterSpec extends ObjectBehavior
{
    public function let(
        CommitterName $committerName,
        CommitterEmail $committerEmail,
        CommitDate $commitDate,
        GithubCommitCommitterDetails $committerDetails
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
        $this->shouldHaveType(GithubCommitCommitter::class);
    }

    public function it_exposes_contructor_arguments(
        CommitterName $committerName,
        CommitterEmail $committerEmail,
        CommitDate $commitDate,
        GithubCommitCommitterDetails $committerDetails
    ) {
        $this->getName()->shouldReturn($committerName);
        $this->getEmail()->shouldReturn($committerEmail);
        $this->getCommitDate()->shouldReturn($commitDate);
        $this->getCommitterDetails()->shouldReturn($committerDetails);
    }
}
