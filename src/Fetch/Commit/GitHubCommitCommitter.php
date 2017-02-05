<?php

declare(strict_types=1);

namespace Devboard\GitHub\Fetch\Commit;

use Devboard\GitHub\Commit\Committer\GitHubCommitCommitterEmail;
use Devboard\GitHub\Commit\Committer\GitHubCommitCommitterName;
use Devboard\GitHub\Commit\GitHubCommitDate;

/**
 * @see GitHubCommitCommitterSpec
 * @see GitHubCommitCommitterTest
 */
class GitHubCommitCommitter
{
    /** @var GitHubCommitCommitterName */
    private $name;
    /** @var GitHubCommitCommitterEmail */
    private $email;
    /** @var GitHubCommitDate */
    private $commitDate;
    /** @var GitHubCommitCommitterDetails */
    private $committerDetails;

    public function __construct(
        GitHubCommitCommitterName $name,
        GitHubCommitCommitterEmail $email,
        GitHubCommitDate $commitDate,
        GitHubCommitCommitterDetails $committerDetails
    ) {
        $this->name             = $name;
        $this->email            = $email;
        $this->commitDate       = $commitDate;
        $this->committerDetails = $committerDetails;
    }

    public function getName(): GitHubCommitCommitterName
    {
        return $this->name;
    }

    public function getEmail(): GitHubCommitCommitterEmail
    {
        return $this->email;
    }

    public function getCommitDate(): GitHubCommitDate
    {
        return $this->commitDate;
    }

    public function getCommitterDetails(): GitHubCommitCommitterDetails
    {
        return $this->committerDetails;
    }
}
