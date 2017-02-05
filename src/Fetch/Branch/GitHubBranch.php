<?php

declare(strict_types=1);

namespace Devboard\GitHub\Fetch\Branch;

use Devboard\GitHub\Branch\GitHubBranchName;
use Devboard\GitHub\Fetch\Commit\GitHubCommit;
use Devboard\GitHub\Repo\GitHubRepoFullName;

/**
 * @see GitHubBranchSpec
 * @see GitHubBranchTest
 */
class GitHubBranch
{
    /** @var GitHubRepoFullName */
    private $repoFullName;
    /** @var GitHubBranchName */
    private $branchName;
    /** @var GitHubCommit */
    private $commit;

    public function __construct(GitHubRepoFullName $repoFullName, GitHubBranchName $branchName, GitHubCommit $commit)
    {
        $this->repoFullName = $repoFullName;
        $this->branchName   = $branchName;
        $this->commit       = $commit;
    }

    public function getRepoFullName(): GitHubRepoFullName
    {
        return $this->repoFullName;
    }

    public function getBranchName(): GitHubBranchName
    {
        return $this->branchName;
    }

    public function getCommit(): GitHubCommit
    {
        return $this->commit;
    }

    public function serialize(): array
    {
        return [
            'repoFullName' => (string) $this->repoFullName,
            'branchName'   => (string) $this->branchName,
            'commit'       => $this->commit->serialize(),
        ];
    }

    public static function deserialize(array $data): GitHubBranch
    {
        return new self(
            GitHubRepoFullName::createFromString($data['repoFullName']),
            new GitHubBranchName($data['branchName']),
            GitHubCommit::deserialize($data['commit'])
        );
    }
}
