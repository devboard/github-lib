<?php

declare(strict_types=1);

namespace Devboard\Github\Fetch\Commit;

use Devboard\Github\Commit\GithubCommitDate;
use Devboard\Github\Commit\GithubCommitMessage;
use Devboard\Github\Commit\GithubCommitSha;

/**
 * @see GithubCommitSpec
 * @see GithubCommitTest
 */
class GithubCommit
{
    /** @var GithubCommitSha */
    private $sha;
    /** @var GithubCommitMessage */
    private $message;
    /** @var GithubCommitDate */
    private $commitDate;
    /** @var \Devboard\Github\Fetch\Commit\GithubCommitAuthor */
    private $author;
    /** @var \Devboard\Github\Fetch\Commit\GithubCommitCommitter */
    private $committer;

    public function __construct(
        GithubCommitSha $sha,
        GithubCommitMessage $message,
        GithubCommitDate $commitDate,
        GithubCommitAuthor $author,
        GithubCommitCommitter $committer
    ) {
        $this->sha        = $sha;
        $this->message    = $message;
        $this->commitDate = $commitDate;
        $this->author     = $author;
        $this->committer  = $committer;
    }

    public function getSha(): GithubCommitSha
    {
        return $this->sha;
    }

    public function getMessage(): GithubCommitMessage
    {
        return $this->message;
    }

    public function getCommitDate(): GithubCommitDate
    {
        return $this->commitDate;
    }

    public function getAuthor(): GithubCommitAuthor
    {
        return $this->author;
    }

    public function getCommitter(): GithubCommitCommitter
    {
        return $this->committer;
    }
}
