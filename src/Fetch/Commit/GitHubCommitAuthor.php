<?php

declare(strict_types=1);

namespace Devboard\GitHub\Fetch\Commit;

use Devboard\GitHub\Commit\Author\GitHubCommitAuthorEmail;
use Devboard\GitHub\Commit\Author\GitHubCommitAuthorName;
use Devboard\GitHub\Commit\GitHubCommitDate;

/**
 * @see GitHubCommitAuthorSpec
 * @see GitHubCommitAuthorTest
 */
class GitHubCommitAuthor
{
    /** @var GitHubCommitAuthorName */
    private $name;
    /** @var GitHubCommitAuthorEmail */
    private $email;
    /** @var GitHubCommitDate */
    private $commitDate;
    /** @var GitHubCommitAuthorDetails */
    private $authorDetails;

    public function __construct(
        GitHubCommitAuthorName $name,
        GitHubCommitAuthorEmail $email,
        GitHubCommitDate $commitDate,
        GitHubCommitAuthorDetails $authorDetails
    ) {
        $this->name             = $name;
        $this->email            = $email;
        $this->commitDate       = $commitDate;
        $this->authorDetails    = $authorDetails;
    }

    public function getName(): GitHubCommitAuthorName
    {
        return $this->name;
    }

    public function getEmail(): GitHubCommitAuthorEmail
    {
        return $this->email;
    }

    public function getCommitDate(): GitHubCommitDate
    {
        return $this->commitDate;
    }

    public function getAuthorDetails(): GitHubCommitAuthorDetails
    {
        return $this->authorDetails;
    }
}