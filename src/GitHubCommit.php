<?php

declare(strict_types=1);

namespace DevboardLib\GitHub;

use DevboardLib\GitHub\Commit\CommitAuthor;
use DevboardLib\GitHub\Commit\CommitCommitter;
use DevboardLib\GitHub\Commit\CommitDate;
use DevboardLib\GitHub\Commit\CommitMessage;
use DevboardLib\GitHub\Commit\CommitSha;

/**
 * @see GitHubCommitSpec
 * @see GitHubCommitTest
 */
class GitHubCommit
{
    /** @var CommitSha */
    private $sha;
    /** @var CommitMessage */
    private $message;
    /** @var CommitDate */
    private $commitDate;
    /** @var \DevboardLib\GitHub\Commit\CommitAuthor */
    private $author;
    /** @var \DevboardLib\GitHub\Commit\CommitCommitter */
    private $committer;

    public function __construct(
        CommitSha $sha,
        CommitMessage $message,
        CommitDate $commitDate,
        CommitAuthor $author,
        CommitCommitter $committer
    ) {
        $this->sha        = $sha;
        $this->message    = $message;
        $this->commitDate = $commitDate;
        $this->author     = $author;
        $this->committer  = $committer;
    }

    public function getSha(): CommitSha
    {
        return $this->sha;
    }

    public function getMessage(): CommitMessage
    {
        return $this->message;
    }

    public function getCommitDate(): CommitDate
    {
        return $this->commitDate;
    }

    public function getAuthor(): CommitAuthor
    {
        return $this->author;
    }

    public function getCommitter(): CommitCommitter
    {
        return $this->committer;
    }

    public function serialize(): array
    {
        return [
            'sha'        => (string) $this->sha,
            'message'    => (string) $this->message,
            'commitDate' => (string) $this->commitDate,
            'author'     => $this->author->serialize(),
            'committer'  => $this->committer->serialize(),
        ];
    }

    public static function deserialize(array $data): GitHubCommit
    {
        return new self(
            new CommitSha($data['sha']),
            new CommitMessage($data['message']),
            new CommitDate($data['commitDate']),
            CommitAuthor::deserialize($data['author']),
            CommitCommitter::deserialize($data['committer'])
        );
    }
}
