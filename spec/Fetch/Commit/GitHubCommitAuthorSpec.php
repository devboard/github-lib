<?php

declare(strict_types=1);

namespace spec\Devboard\GitHub\Fetch\Commit;

use Devboard\GitHub\Commit\Author\GitHubCommitAuthorEmail as AuthorEmail;
use Devboard\GitHub\Commit\Author\GitHubCommitAuthorName as AuthorName;
use Devboard\GitHub\Commit\GitHubCommitDate as CommitDate;
use Devboard\GitHub\Fetch\Commit\GitHubCommitAuthor;
use Devboard\GitHub\Fetch\Commit\GitHubCommitAuthorDetails;
use PhpSpec\ObjectBehavior;

class GitHubCommitAuthorSpec extends ObjectBehavior
{
    public function let(
        AuthorName $authorName,
        AuthorEmail $authorEmail,
        CommitDate $commitDate,
        GitHubCommitAuthorDetails $authorDetails
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
        $this->shouldHaveType(GitHubCommitAuthor::class);
    }

    public function it_exposes_contructor_arguments(AuthorName $authorName,
        AuthorEmail $authorEmail,
        CommitDate $commitDate,
        GitHubCommitAuthorDetails $authorDetails
    ) {
        $this->getName()->shouldReturn($authorName);
        $this->getEmail()->shouldReturn($authorEmail);
        $this->getCommitDate()->shouldReturn($commitDate);
        $this->getAuthorDetails()->shouldReturn($authorDetails);
    }
}
