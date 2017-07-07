<?php

declare(strict_types=1);

namespace DevboardLib\GitHub;

use DevboardLib\GitHub\Repo\RepoFullName;
use DevboardLib\GitHub\Tag\TagName;

/**
 * @see GitHubTagSpec
 * @see GitHubTagTest
 */
class GitHubTag
{
    /** @var RepoFullName */
    private $repoFullName;
    /** @var TagName */
    private $tagName;
    /** @var GitHubCommit */
    private $commit;

    public function __construct(RepoFullName $repoFullName, TagName $tagName, GitHubCommit $commit)
    {
        $this->repoFullName = $repoFullName;
        $this->tagName      = $tagName;
        $this->commit       = $commit;
    }

    public function getRepoFullName(): RepoFullName
    {
        return $this->repoFullName;
    }

    public function getTagName(): TagName
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
            RepoFullName::createFromString($data['repoFullName']),
            new TagName($data['tagName']),
            GitHubCommit::deserialize($data['commit'])
        );
    }
}
