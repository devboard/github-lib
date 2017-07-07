<?php

declare(strict_types=1);

namespace spec\DevboardLib\GitHub;

use DevboardLib\GitHub\Commit\GitHubCommitAuthor;
use DevboardLib\GitHub\Commit\GitHubCommitCommitter;
use DevboardLib\GitHub\Commit\GitHubCommitDate;
use DevboardLib\GitHub\Commit\GitHubCommitMessage;
use DevboardLib\GitHub\Commit\GitHubCommitSha;
use DevboardLib\GitHub\GitHubCommit;
use PhpSpec\ObjectBehavior;

class GitHubCommitSpec extends ObjectBehavior
{
    public function let(
        GitHubCommitSha $sha,
        GitHubCommitMessage $message,
        GitHubCommitDate $commitDate,
        GitHubCommitAuthor $author,
        GitHubCommitCommitter $committer
    ) {
        $this->beConstructedWith($sha, $message, $commitDate, $author, $committer);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(GitHubCommit::class);
    }

    public function it_exposes_contructor_arguments(
        GitHubCommitSha $sha,
        GitHubCommitMessage $message,
        GitHubCommitDate $commitDate,
        GitHubCommitAuthor $author,
        GitHubCommitCommitter $committer
    ) {
        $this->getSha()->shouldReturn($sha);
        $this->getMessage()->shouldReturn($message);
        $this->getCommitDate()->shouldReturn($commitDate);
        $this->getAuthor()->shouldReturn($author);
        $this->getCommitter()->shouldReturn($committer);
    }
}
