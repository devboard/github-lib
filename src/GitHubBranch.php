<?php

declare(strict_types=1);

namespace DevboardLib\GitHub;

use DevboardLib\GitHub\Branch\BranchName;
use DevboardLib\GitHub\Repo\RepoFullName;

/**
 * @see GitHubBranchSpec
 * @see GitHubBranchTest
 */
class GitHubBranch
{
    /** @var RepoFullName */
    private $repoFullName;
    /** @var BranchName */
    private $branchName;
    /** @var GitHubCommit */
    private $commit;

    public function __construct(RepoFullName $repoFullName, BranchName $branchName, GitHubCommit $commit)
    {
        $this->repoFullName = $repoFullName;
        $this->branchName   = $branchName;
        $this->commit       = $commit;
    }

    public function getRepoFullName(): RepoFullName
    {
        return $this->repoFullName;
    }

    public function getBranchName(): BranchName
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
            RepoFullName::createFromString($data['repoFullName']),
            new BranchName($data['branchName']),
            GitHubCommit::deserialize($data['commit'])
        );
    }
}
