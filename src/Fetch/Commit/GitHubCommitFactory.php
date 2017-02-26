<?php

declare(strict_types=1);

namespace Devboard\GitHub\Fetch\Commit;

use Devboard\GitHub\Commit\GitHubCommitDate;
use Devboard\GitHub\Commit\GitHubCommitMessage;
use Devboard\GitHub\Commit\GitHubCommitSha;
use Devboard\GitHub\GitHubCommit;

/**
 * @see GitHubCommitFactorySpec
 * @see GitHubCommitFactoryTest
 */
class GitHubCommitFactory
{
    /** @var GitHubCommitCommitterFactory */
    private $committerFactory;
    /** @var GitHubCommitAuthorFactory */
    private $authorFactory;

    public function __construct()
    {
        $this->committerFactory = new GitHubCommitCommitterFactory();
        $this->authorFactory    = new GitHubCommitAuthorFactory();
    }

    public function createFromBranchData(array $data): GitHubCommit
    {
        return new GitHubCommit(
            new GitHubCommitSha($data['commit']['sha']),
            new GitHubCommitMessage($data['commit']['commit']['message']),
            new GitHubCommitDate($data['commit']['commit']['author']['date']),
            $this->authorFactory->createFromBranchData($data),
            $this->committerFactory->createFromBranchData($data)
        );
    }
}
