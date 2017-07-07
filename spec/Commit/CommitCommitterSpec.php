<?php

declare(strict_types=1);

namespace spec\DevboardLib\GitHub\Commit;

use DevboardLib\GitHub\Commit\CommitCommitter;
use DevboardLib\GitHub\Commit\CommitCommitterDetails;
use DevboardLib\GitHub\Commit\CommitDate as CommitDate;
use DevboardLib\GitHub\Commit\Committer\CommitCommitterEmail as CommitterEmail;
use DevboardLib\GitHub\Commit\Committer\CommitCommitterName as CommitterName;
use PhpSpec\ObjectBehavior;

class CommitCommitterSpec extends ObjectBehavior
{
    public function let(
        CommitterName $committerName,
        CommitterEmail $committerEmail,
        CommitDate $commitDate,
        CommitCommitterDetails $committerDetails
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
        $this->shouldHaveType(CommitCommitter::class);
    }

    public function it_exposes_contructor_arguments(
        CommitterName $committerName,
        CommitterEmail $committerEmail,
        CommitDate $commitDate,
        CommitCommitterDetails $committerDetails
    ) {
        $this->getName()->shouldReturn($committerName);
        $this->getEmail()->shouldReturn($committerEmail);
        $this->getCommitDate()->shouldReturn($commitDate);
        $this->getCommitterDetails()->shouldReturn($committerDetails);
    }
}
