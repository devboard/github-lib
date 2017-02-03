<?php

declare(strict_types=1);

namespace Devboard\Github\Fetch\Repo;

use Devboard\Github\Repo\GithubRepoEndpoints;
use Devboard\Github\Repo\GithubRepoFullName;
use Devboard\Github\Repo\GithubRepoId;
use Devboard\Github\Repo\GithubRepoOwner;
use Devboard\Github\Repo\GithubRepoStats;
use Devboard\Github\Repo\GithubRepoTimestamps;

/**
 * @see GithubRepoSpec
 * @see GithubRepoTest
 */
class GithubRepo
{
    /** @var GithubRepoId */
    private $id;
    /** @var GithubRepoFullName */
    private $fullName;
    /** @var GithubRepoOwner */
    private $owner;
    /** @var bool */
    private $private;
    /** @var GithubRepoEndpoints */
    private $endpoints;
    /** @var GithubRepoTimestamps */
    private $timestamps;
    /** @var GithubRepoStats */
    private $stats;

    public function __construct(
        GithubRepoId $id,
        GithubRepoFullName $fullName,
        GithubRepoOwner $owner,
        bool $private,
        GithubRepoEndpoints $endpoints,
        GithubRepoTimestamps $timestamps,
        GithubRepoStats $stats
    ) {
        $this->id         = $id;
        $this->fullName   = $fullName;
        $this->owner      = $owner;
        $this->private    = $private;
        $this->endpoints  = $endpoints;
        $this->timestamps = $timestamps;
        $this->stats      = $stats;
    }

    public function getId(): GithubRepoId
    {
        return $this->id;
    }

    public function getFullName(): GithubRepoFullName
    {
        return $this->fullName;
    }

    public function getOwner(): GithubRepoOwner
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

    public function getEndpoints(): GithubRepoEndpoints
    {
        return $this->endpoints;
    }

    public function getTimestamps(): GithubRepoTimestamps
    {
        return $this->timestamps;
    }

    public function getStats(): GithubRepoStats
    {
        return $this->stats;
    }
}
