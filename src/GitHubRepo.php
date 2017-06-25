<?php

declare(strict_types=1);

namespace Devboard\GitHub;

use Devboard\GitHub\Account\GitHubAccountLogin;
use Devboard\GitHub\Repo\GitHubRepoEndpoints;
use Devboard\GitHub\Repo\GitHubRepoFullName;
use Devboard\GitHub\Repo\GitHubRepoId;
use Devboard\GitHub\Repo\GitHubRepoName;
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
    private $ownerDetails;
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
        ?GitHubRepoOwner $ownerDetails,
        bool $private,
        GitHubRepoEndpoints $endpoints,
        GitHubRepoTimestamps $timestamps,
        GitHubRepoStats $stats
    ) {
        $this->id           = $id;
        $this->fullName     = $fullName;
        $this->ownerDetails = $ownerDetails;
        $this->private      = $private;
        $this->endpoints    = $endpoints;
        $this->timestamps   = $timestamps;
        $this->stats        = $stats;
    }

    public function getId(): GitHubRepoId
    {
        return $this->id;
    }

    public function getFullName(): GitHubRepoFullName
    {
        return $this->fullName;
    }

    public function getOwnerLogin(): GitHubAccountLogin
    {
        return $this->fullName->getOwner();
    }

    public function getRepoName(): GitHubRepoName
    {
        return $this->fullName->getRepoName();
    }

    public function hasOwnerDetails(): bool
    {
        if (null === $this->ownerDetails) {
            return false;
        }

        return true;
    }

    public function getOwnerDetails(): ?GitHubRepoOwner
    {
        return $this->ownerDetails;
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
        if (true === $this->hasOwnerDetails()) {
            $ownerDetails = $this->ownerDetails->serialize();
        } else {
            $ownerDetails = null;
        }

        return [
            'id'           => $this->id->getValue(),
            'fullName'     => (string) $this->fullName,
            'ownerDetails' => $ownerDetails,
            'private'      => $this->private,
            'endpoints'    => $this->endpoints->serialize(),
            'timestamps'   => $this->timestamps->serialize(),
            'stats'        => $this->stats->serialize(),
        ];
    }

    public static function deserialize(array $data): GitHubRepo
    {
        if (null === $data['ownerDetails']) {
            $ownerDetails = null;
        } else {
            $ownerDetails = GitHubRepoOwner::deserialize($data['ownerDetails']);
        }

        return new self(
            new GitHubRepoId($data['id']),
            GitHubRepoFullName::createFromString($data['fullName']),
            $ownerDetails,
            $data['private'],
            GitHubRepoEndpoints::deserialize($data['endpoints']),
            GitHubRepoTimestamps::deserialize($data['timestamps']),
            GitHubRepoStats::deserialize($data['stats'])
        );
    }
}
