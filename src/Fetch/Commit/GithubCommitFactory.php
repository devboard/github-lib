<?php

declare(strict_types=1);

namespace Devboard\Github\Fetch\Commit;

use Devboard\Github\Commit\GithubCommitDate;
use Devboard\Github\Commit\GithubCommitMessage;
use Devboard\Github\Commit\GithubCommitSha;

/**
 * @see GithubCommitFactorySpec
 * @see GithubCommitFactoryTest
 */
class GithubCommitFactory
{
    /** @var GithubCommitCommitterFactory */
    private $committerFactory;
    /** @var GithubCommitAuthorFactory */
    private $authorFactory;

    public function __construct()
    {
        $this->committerFactory = new GithubCommitCommitterFactory();
        $this->authorFactory    = new GithubCommitAuthorFactory();
    }

    public function createFromBranchData(array $data): GithubCommit
    {
        return new GithubCommit(
            new GithubCommitSha($data['commit']['sha']),
            new GithubCommitMessage($data['commit']['commit']['message']),
            new GithubCommitDate($data['commit']['commit']['author']['date']),
            $this->authorFactory->createFromBranchData($data),
            $this->committerFactory->createFromBranchData($data)
        );
    }
}
