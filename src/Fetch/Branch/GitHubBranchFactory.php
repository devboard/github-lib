<?php

declare(strict_types=1);

namespace Devboard\GitHub\Fetch\Branch;

use Devboard\GitHub\Branch\GitHubBranchName;
use Devboard\GitHub\Fetch\Commit\GitHubCommitFactory;
use Devboard\GitHub\Repo\GitHubRepoFullName;

/**
 * @see GitHubBranchFactorySpec
 * @see GitHubBranchFactoryTest
 */
class GitHubBranchFactory
{
    /** @var GitHubCommitFactory */
    private $commitFactory;

    public function __construct()
    {
        $this->commitFactory = new GitHubCommitFactory();
    }

    public function createFromBranchData(GitHubRepoFullName $repoFullName, array $data): GitHubBranch
    {
        return new GitHubBranch(
            $repoFullName,
            new GitHubBranchName($data['name']),
            $this->commitFactory->createFromBranchData($data)
        );
    }
}
