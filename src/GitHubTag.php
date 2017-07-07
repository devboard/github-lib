<?php

declare(strict_types=1);

namespace DevboardLib\GitHub;

use DevboardLib\GitHub\Repo\GitHubRepoFullName;
use DevboardLib\GitHub\Tag\GitHubTagName;

/**
 * @see GitHubTagSpec
 * @see GitHubTagTest
 */
class GitHubTag
{
    /** @var GitHubRepoFullName */
    private $repoFullName;
    /** @var GitHubTagName */
    private $tagName;
    /** @var GitHubCommit */
    private $commit;

    public function __construct(GitHubRepoFullName $repoFullName, GitHubTagName $tagName, GitHubCommit $commit)
    {
        $this->repoFullName = $repoFullName;
        $this->tagName      = $tagName;
        $this->commit       = $commit;
    }

    public function getRepoFullName(): GitHubRepoFullName
    {
        return $this->repoFullName;
    }

    public function getTagName(): GitHubTagName
    {
        return $this->tagName;
    }

    public function getCommit(): GitHubCommit
    {
        return $this->commit;
    }

    public function serialize(): array
    {
        return [
            'repoFullName' => (string) $this->repoFullName,
            'tagName'      => (string) $this->tagName,
            'commit'       => $this->commit->serialize(),
        ];
    }

    public static function deserialize(array $data): GitHubTag
    {
        return new self(
            GitHubRepoFullName::createFromString($data['repoFullName']),
            new GitHubTagName($data['tagName']),
            GitHubCommit::deserialize($data['commit'])
        );
    }
}
