<?php

declare(strict_types=1);

namespace spec\Devboard\Github\Fetch\Commit;

use Devboard\Github\Commit\Author\GithubCommitAuthorEmail as AuthorEmail;
use Devboard\Github\Commit\Author\GithubCommitAuthorName as AuthorName;
use Devboard\Github\Commit\GithubCommitDate as CommitDate;
use Devboard\Github\Fetch\Commit\GithubCommitAuthor;
use Devboard\Github\Fetch\Commit\GithubCommitAuthorDetails;
use PhpSpec\ObjectBehavior;

class GithubCommitAuthorSpec extends ObjectBehavior
{
    public function let(
        AuthorName $authorName,
        AuthorEmail $authorEmail,
        CommitDate $commitDate,
        GithubCommitAuthorDetails $authorDetails
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
        $this->shouldHaveType(GithubCommitAuthor::class);
    }
}
