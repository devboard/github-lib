<?php

declare(strict_types=1);

namespace spec\DevboardLib\GitHub\Commit;

use DevboardLib\GitHub\Commit\Author\GitHubCommitAuthorEmail as AuthorEmail;
use DevboardLib\GitHub\Commit\Author\GitHubCommitAuthorName as AuthorName;
use DevboardLib\GitHub\Commit\GitHubCommitAuthor;
use DevboardLib\GitHub\Commit\GitHubCommitAuthorDetails;
use DevboardLib\GitHub\Commit\GitHubCommitDate as CommitDate;
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
