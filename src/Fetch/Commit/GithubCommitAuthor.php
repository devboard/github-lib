<?php

declare(strict_types=1);

namespace Devboard\Github\Fetch\Commit;

use Devboard\Github\Commit\Author\GithubCommitAuthorEmail;
use Devboard\Github\Commit\Author\GithubCommitAuthorName;
use Devboard\Github\Commit\GithubCommitDate;

/**
 * @see GithubCommitAuthorSpec
 * @see GithubCommitAuthorTest
 */
class GithubCommitAuthor
{
    /** @var GithubCommitAuthorName */
    private $name;
    /** @var GithubCommitAuthorEmail */
    private $email;
    /** @var GithubCommitDate */
    private $commitDate;
    /** @var GithubCommitAuthorDetails */
    private $authorDetails;

    public function __construct(
        GithubCommitAuthorName $name,
        GithubCommitAuthorEmail $email,
        GithubCommitDate $commitDate,
        GithubCommitAuthorDetails $authorDetails
    ) {
        $this->name             = $name;
        $this->email            = $email;
        $this->commitDate       = $commitDate;
        $this->authorDetails    = $authorDetails;
    }

    public function getName(): GithubCommitAuthorName
    {
        return $this->name;
    }

    public function getEmail(): GithubCommitAuthorEmail
    {
        return $this->email;
    }

    public function getCommitDate(): GithubCommitDate
    {
        return $this->commitDate;
    }

    public function getAuthorDetails(): GithubCommitAuthorDetails
    {
        return $this->authorDetails;
    }
}
