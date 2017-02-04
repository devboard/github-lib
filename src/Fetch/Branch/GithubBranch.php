<?php

declare(strict_types=1);

namespace Devboard\Github\Fetch\Branch;

use Devboard\Github\Branch\GithubBranchName;
use Devboard\Github\Fetch\Commit\GithubCommit;
use Devboard\Github\Repo\GithubRepoFullName;

/**
 * @see GithubBranchSpec
 * @see GithubBranchTest
 */
class GithubBranch
{
    /** @var GithubRepoFullName */
    private $repoFullName;
    /** @var GithubBranchName */
    private $branchName;
    /** @var GithubCommit */
    private $commit;

    public function __construct(GithubRepoFullName $repoFullName, GithubBranchName $branchName, GithubCommit $commit)
    {
        $this->repoFullName = $repoFullName;
        $this->branchName   = $branchName;
        $this->commit       = $commit;
    }

    public function getRepoFullName(): GithubRepoFullName
    {
        return $this->repoFullName;
    }

    public function getBranchName(): GithubBranchName
    {
        return $this->branchName;
    }

    public function getCommit(): GithubCommit
    {
        return $this->commit;
    }
}
