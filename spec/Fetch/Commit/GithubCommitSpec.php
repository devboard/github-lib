<?php

declare(strict_types=1);

namespace spec\Devboard\Github\Fetch\Commit;

use Devboard\Github\Commit\GithubCommitDate;
use Devboard\Github\Commit\GithubCommitMessage;
use Devboard\Github\Commit\GithubCommitSha;
use Devboard\Github\Fetch\Commit\GithubCommit;
use Devboard\Github\Fetch\Commit\GithubCommitAuthor;
use Devboard\Github\Fetch\Commit\GithubCommitCommitter;
use PhpSpec\ObjectBehavior;

class GithubCommitSpec extends ObjectBehavior
{
    public function let(
        GithubCommitSha $sha,
        GithubCommitMessage $message,
        GithubCommitDate $commitDate,
        GithubCommitAuthor $author,
        GithubCommitCommitter $committer
    ) {
        $this->beConstructedWith($sha, $message, $commitDate, $author, $committer);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(GithubCommit::class);
    }

    public function it_exposes_contructor_arguments(
        GithubCommitSha $sha,
        GithubCommitMessage $message,
        GithubCommitDate $commitDate,
        GithubCommitAuthor $author,
        GithubCommitCommitter $committer
    ) {
        $this->getSha()->shouldReturn($sha);
        $this->getMessage()->shouldReturn($message);
        $this->getCommitDate()->shouldReturn($commitDate);
        $this->getAuthor()->shouldReturn($author);
        $this->getCommitter()->shouldReturn($committer);
    }
}
