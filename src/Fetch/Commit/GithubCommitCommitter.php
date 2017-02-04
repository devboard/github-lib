<?php

declare(strict_types=1);

namespace Devboard\Github\Fetch\Commit;

use Devboard\Github\Commit\Committer\GithubCommitCommitterEmail;
use Devboard\Github\Commit\Committer\GithubCommitCommitterName;
use Devboard\Github\Commit\GithubCommitDate;

/**
 * @see GithubCommitCommitterSpec
 * @see GithubCommitCommitterTest
 */
class GithubCommitCommitter
{
    /** @var GithubCommitCommitterName */
    private $name;
    /** @var GithubCommitCommitterEmail */
    private $email;
    /** @var GithubCommitDate */
    private $commitDate;
    /** @var GithubCommitCommitterDetails */
    private $committerDetails;

    public function __construct(
        GithubCommitCommitterName $name,
        GithubCommitCommitterEmail $email,
        GithubCommitDate $commitDate,
        GithubCommitCommitterDetails $committerDetails
    ) {
        $this->name             = $name;
        $this->email            = $email;
        $this->commitDate       = $commitDate;
        $this->committerDetails = $committerDetails;
    }

    public function getName(): GithubCommitCommitterName
    {
        return $this->name;
    }

    public function getEmail(): GithubCommitCommitterEmail
    {
        return $this->email;
    }

    public function getCommitDate(): GithubCommitDate
    {
        return $this->commitDate;
    }

    public function getCommitterDetails(): GithubCommitCommitterDetails
    {
        return $this->committerDetails;
    }
}
