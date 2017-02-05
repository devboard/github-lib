<?php

declare(strict_types=1);

namespace Devboard\GitHub\Fetch\Commit;

use Devboard\GitHub\Commit\GitHubCommitDate;
use Devboard\GitHub\Commit\GitHubCommitMessage;
use Devboard\GitHub\Commit\GitHubCommitSha;

/**
 * @see GitHubCommitSpec
 * @see GitHubCommitTest
 */
class GitHubCommit
{
    /** @var GitHubCommitSha */
    private $sha;
    /** @var GitHubCommitMessage */
    private $message;
    /** @var GitHubCommitDate */
    private $commitDate;
    /** @var \Devboard\GitHub\Fetch\Commit\GitHubCommitAuthor */
    private $author;
    /** @var \Devboard\GitHub\Fetch\Commit\GitHubCommitCommitter */
    private $committer;

    public function __construct(
        GitHubCommitSha $sha,
        GitHubCommitMessage $message,
        GitHubCommitDate $commitDate,
        GitHubCommitAuthor $author,
        GitHubCommitCommitter $committer
    ) {
        $this->sha        = $sha;
        $this->message    = $message;
        $this->commitDate = $commitDate;
        $this->author     = $author;
        $this->committer  = $committer;
    }

    public function getSha(): GitHubCommitSha
    {
        return $this->sha;
    }

    public function getMessage(): GitHubCommitMessage
    {
        return $this->message;
    }

    public function getCommitDate(): GitHubCommitDate
    {
        return $this->commitDate;
    }

    public function getAuthor(): GitHubCommitAuthor
    {
        return $this->author;
    }

    public function getCommitter(): GitHubCommitCommitter
    {
        return $this->committer;
    }
}