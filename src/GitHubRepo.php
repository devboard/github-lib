<?php

declare(strict_types=1);

namespace DevboardLib\GitHub;

use DevboardLib\GitHub\Account\AccountLogin;
use DevboardLib\GitHub\Repo\RepoEndpoints;
use DevboardLib\GitHub\Repo\RepoFullName;
use DevboardLib\GitHub\Repo\RepoId;
use DevboardLib\GitHub\Repo\RepoName;
use DevboardLib\GitHub\Repo\RepoOwner;
use DevboardLib\GitHub\Repo\RepoStats;
use DevboardLib\GitHub\Repo\RepoTimestamps;

/**
 * @see GitHubRepoSpec
 * @see GitHubRepoTest
 */
class GitHubRepo
{
    /** @var RepoId */
    private $id;
    /** @var RepoFullName */
    private $fullName;
    /** @var RepoOwner */
    private $ownerDetails;
    /** @var bool */
    private $private;
    /** @var RepoEndpoints */
    private $endpoints;
    /** @var RepoTimestamps */
    private $timestamps;
    /** @var RepoStats */
    private $stats;

    public function __construct(
        RepoId $id,
        RepoFullName $fullName,
        ?RepoOwner $ownerDetails,
        bool $private,
        RepoEndpoints $endpoints,
        RepoTimestamps $timestamps,
        RepoStats $stats
    ) {
        $this->id           = $id;
        $this->fullName     = $fullName;
        $this->ownerDetails = $ownerDetails;
        $this->private      = $private;
        $this->endpoints    = $endpoints;
        $this->timestamps   = $timestamps;
        $this->stats        = $stats;
    }

    public function getId(): RepoId
    {
        return $this->id;
    }

    public function getFullName(): RepoFullName
    {
        return $this->fullName;
    }

    public function getOwnerLogin(): AccountLogin
    {
        return $this->fullName->getOwner();
    }

    public function getRepoName(): RepoName
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

    public function getOwnerDetails(): ?RepoOwner
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

    public function getEndpoints(): RepoEndpoints
    {
        return $this->endpoints;
    }

    public function getTimestamps(): RepoTimestamps
    {
        return $this->timestamps;
    }

    public function getStats(): RepoStats
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
            $ownerDetails = RepoOwner::deserialize($data['ownerDetails']);
        }

        return new self(
            new RepoId($data['id']),
            RepoFullName::createFromString($data['fullName']),
            $ownerDetails,
            $data['private'],
            RepoEndpoints::deserialize($data['endpoints']),
            RepoTimestamps::deserialize($data['timestamps']),
            RepoStats::deserialize($data['stats'])
        );
    }
}
