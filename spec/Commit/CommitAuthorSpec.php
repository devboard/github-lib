<?php

declare(strict_types=1);

namespace spec\DevboardLib\GitHub\Commit;

use DevboardLib\GitHub\Commit\Author\CommitAuthorEmail as AuthorEmail;
use DevboardLib\GitHub\Commit\Author\CommitAuthorName as AuthorName;
use DevboardLib\GitHub\Commit\CommitAuthor;
use DevboardLib\GitHub\Commit\CommitAuthorDetails;
use DevboardLib\GitHub\Commit\CommitDate as CommitDate;
use PhpSpec\ObjectBehavior;

class CommitAuthorSpec extends ObjectBehavior
{
    public function let(
        AuthorName $authorName,
        AuthorEmail $authorEmail,
        CommitDate $commitDate,
        CommitAuthorDetails $authorDetails
    ) {
        $this->beConstructedWith(
            $authorName,
            $authorEmail,
            $commitDate,
            $authorDetails
        );
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(CommitAuthor::class);
    }

    public function it_exposes_contructor_arguments(AuthorName $authorName,
        AuthorEmail $authorEmail,
        CommitDate $commitDate,
        CommitAuthorDetails $authorDetails
    ) {
        $this->getName()->shouldReturn($authorName);
        $this->getEmail()->shouldReturn($authorEmail);
        $this->getCommitDate()->shouldReturn($commitDate);
        $this->getAuthorDetails()->shouldReturn($authorDetails);
    }
}
