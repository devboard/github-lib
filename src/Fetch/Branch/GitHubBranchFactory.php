<?php

declare(strict_types=1);

namespace Devboard\GitHub\Fetch\Branch;

use Devboard\GitHub\Branch\GitHubBranchName;
use Devboard\GitHub\Fetch\Commit\GitHubCommitFactory;
use Devboard\GitHub\GitHubBranch;
use Devboard\GitHub\Repo\GitHubRepoFullName;

/**
 * @see GitHubBranchFactorySpec
 * @see GitHubBranchFactoryTest
 */
class GitHubBranchFactory
{
    /** @var GitHubCommitFactory */
    private $commitFactory;

    public function __construct(GitHubCommitFactory $commitFactory)
    {
        $this->commitFactory = $commitFactory;
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
