<?php

declare(strict_types=1);

namespace Devboard\GitHub\Fetch\Repo;

use Devboard\GitHub\Repo\GitHubRepoEndpoints;
use Devboard\GitHub\Repo\GitHubRepoFullName;
use Devboard\GitHub\Repo\GitHubRepoId;
use Devboard\GitHub\Repo\GitHubRepoOwner;
use Devboard\GitHub\Repo\GitHubRepoStats;
use Devboard\GitHub\Repo\GitHubRepoTimestamps;

/**
 * @see GitHubRepoSpec
 * @see GitHubRepoTest
 */
class GitHubRepo
{
    /** @var GitHubRepoId */
    private $id;
    /** @var GitHubRepoFullName */
    private $fullName;
    /** @var GitHubRepoOwner */
    private $owner;
    /** @var bool */
    private $private;
    /** @var GitHubRepoEndpoints */
    private $endpoints;
    /** @var GitHubRepoTimestamps */
    private $timestamps;
    /** @var GitHubRepoStats */
    private $stats;

    public function __construct(
        GitHubRepoId $id,
        GitHubRepoFullName $fullName,
        GitHubRepoOwner $owner,
        bool $private,
        GitHubRepoEndpoints $endpoints,
        GitHubRepoTimestamps $timestamps,
        GitHubRepoStats $stats
    ) {
        $this->id         = $id;
        $this->fullName   = $fullName;
        $this->owner      = $owner;
        $this->private    = $private;
        $this->endpoints  = $endpoints;
        $this->timestamps = $timestamps;
        $this->stats      = $stats;
    }

    public function getId(): GitHubRepoId
    {
        return $this->id;
    }

    public function getFullName(): GitHubRepoFullName
    {
        return $this->fullName;
    }

    public function getOwner(): GitHubRepoOwner
    {
        return $this->owner;
    }

    public function isPrivate(): bool
    {
        return $this->private;
    }

    public function isPublic(): bool
    {
        return !$this->private;
    }

    public function getEndpoints(): GitHubRepoEndpoints
    {
        return $this->endpoints;
    }

    public function getTimestamps(): GitHubRepoTimestamps
    {
        return $this->timestamps;
    }

    public function getStats(): GitHubRepoStats
    {
        return $this->stats;
    }

    public function serialize(): array
    {
        return [
            'id'         => $this->id->getValue(),
            'fullName'   => (string) $this->fullName,
            'owner'      => $this->owner->serialize(),
            'private'    => $this->private,
            'endpoints'  => $this->endpoints->serialize(),
            'timestamps' => $this->timestamps->serialize(),
            'stats'      => $this->stats->serialize(),
        ];
    }

    public static function deserialize(array $data): GitHubRepo
    {
        return new self(
            new GitHubRepoId($data['id']),
            GitHubRepoFullName::createFromString($data['fullName']),
            GitHubRepoOwner::deserialize($data['owner']),
            $data['private'],
            GitHubRepoEndpoints::deserialize($data['endpoints']),
            GitHubRepoTimestamps::deserialize($data['timestamps']),
            GitHubRepoStats::deserialize($data['stats'])
        );
    }
}
