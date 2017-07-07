<?php

declare(strict_types=1);

namespace spec\DevboardLib\GitHub;

use DevboardLib\GitHub\Commit\CommitAuthor;
use DevboardLib\GitHub\Commit\CommitCommitter;
use DevboardLib\GitHub\Commit\CommitDate;
use DevboardLib\GitHub\Commit\CommitMessage;
use DevboardLib\GitHub\Commit\CommitSha;
use DevboardLib\GitHub\GitHubCommit;
use PhpSpec\ObjectBehavior;

class GitHubCommitSpec extends ObjectBehavior
{
    public function let(
        CommitSha $sha,
        CommitMessage $message,
        CommitDate $commitDate,
        CommitAuthor $author,
        CommitCommitter $committer
    ) {
        $this->beConstructedWith($sha, $message, $commitDate, $author, $committer);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(GitHubCommit::class);
    }

    public function it_exposes_contructor_arguments(
        CommitSha $sha,
        CommitMessage $message,
        CommitDate $commitDate,
        CommitAuthor $author,
        CommitCommitter $committer
    ) {
        $this->getSha()->shouldReturn($sha);
        $this->getMessage()->shouldReturn($message);
        $this->getCommitDate()->shouldReturn($commitDate);
        $this->getAuthor()->shouldReturn($author);
        $this->getCommitter()->shouldReturn($committer);
    }
}
