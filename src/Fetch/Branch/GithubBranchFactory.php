<?php

declare(strict_types=1);

namespace Devboard\Github\Fetch\Branch;

use Devboard\Github\Branch\GithubBranchName;
use Devboard\Github\Fetch\Commit\GithubCommitFactory;
use Devboard\Github\Repo\GithubRepoFullName;

/**
 * @see GithubBranchFactorySpec
 * @see GithubBranchFactoryTest
 */
class GithubBranchFactory
{
    /** @var GithubCommitFactory */
    private $commitFactory;

    public function __construct()
    {
        $this->commitFactory = new GithubCommitFactory();
    }

    public function createFromBranchData(GithubRepoFullName $repoFullName, array $data): GithubBranch
    {
        return new GithubBranch(
            $repoFullName,
            new GithubBranchName($data['name']),
            $this->commitFactory->createFromBranchData($data)
        );
    }
}
