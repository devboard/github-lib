<?php

declare(strict_types=1);

namespace DevboardLib\GitHub\Commit;

use DevboardLib\GitHub\Account\GitHubAccountType;
use DevboardLib\GitHub\Commit\Committer\GitHubCommitCommitterEmail;
use DevboardLib\GitHub\Commit\Committer\GitHubCommitCommitterName;
use DevboardLib\GitHub\User\UserApiUrl;
use DevboardLib\GitHub\User\UserAvatarUrl;
use DevboardLib\GitHub\User\UserGravatarId;
use DevboardLib\GitHub\User\UserHtmlUrl;
use DevboardLib\GitHub\User\UserId;
use DevboardLib\GitHub\User\UserLogin;

/**
 * @see GitHubCommitCommitterSpec
 * @see GitHubCommitCommitterTest
 */
class GitHubCommitCommitter
{
    /** @var GitHubCommitCommitterName */
    private $name;
    /** @var GitHubCommitCommitterEmail */
    private $email;
    /** @var GitHubCommitDate */
    private $commitDate;
    /** @var GitHubCommitCommitterDetails */
    private $committerDetails;

    public function __construct(
        GitHubCommitCommitterName $name,
        GitHubCommitCommitterEmail $email,
        GitHubCommitDate $commitDate,
        ?GitHubCommitCommitterDetails $committerDetails
    ) {
        $this->name             = $name;
        $this->email            = $email;
        $this->commitDate       = $commitDate;
        $this->committerDetails = $committerDetails;
    }

    public function getName(): GitHubCommitCommitterName
    {
        return $this->name;
    }

    public function getEmail(): GitHubCommitCommitterEmail
    {
        return $this->email;
    }

    public function getCommitDate(): GitHubCommitDate
    {
        return $this->commitDate;
    }

    public function hasCommitterDetails(): bool
    {
        if (null === $this->committerDetails) {
            return false;
        }

        return true;
    }

    public function getCommitterDetails(): ?GitHubCommitCommitterDetails
    {
        return $this->committerDetails;
    }

    public function getUserId(): ?UserId
    {
        if (null === $this->committerDetails) {
            return null;
        }

        return $this->committerDetails->getUserId();
    }

    public function getLogin(): ?UserLogin
    {
        if (null === $this->committerDetails) {
            return null;
        }

        return $this->committerDetails->getLogin();
    }

    public function getGitHubAccountType(): ?GitHubAccountType
    {
        if (null === $this->committerDetails) {
            return null;
        }

        return $this->committerDetails->getGitHubAccountType();
    }

    public function getAvatarUrl(): ?UserAvatarUrl
    {
        if (null === $this->committerDetails) {
            return null;
        }

        return $this->committerDetails->getAvatarUrl();
    }

    public function getGravatarId(): ?UserGravatarId
    {
        if (null === $this->committerDetails) {
            return null;
        }

        return $this->committerDetails->getGravatarId();
    }

    public function getHtmlUrl(): ?UserHtmlUrl
    {
        if (null === $this->committerDetails) {
            return null;
        }

        return $this->committerDetails->getHtmlUrl();
    }

    public function getApiUrl(): ?UserApiUrl
    {
        if (null === $this->committerDetails) {
            return null;
        }

        return $this->committerDetails->getApiUrl();
    }

    public function isSiteAdmin(): ?bool
    {
        if (null === $this->committerDetails) {
            return null;
        }

        return $this->committerDetails->isSiteAdmin();
    }

    public function serialize(): array
    {
        if (true === $this->hasCommitterDetails()) {
            $committerDetails = $this->committerDetails->serialize();
        } else {
            $committerDetails = null;
        }

        return [
            'name'             => (string) $this->name,
            'email'            => (string) $this->email,
            'commitDate'       => (string) $this->commitDate,
            'committerDetails' => $committerDetails,
        ];
    }

    public static function deserialize(array $data): GitHubCommitCommitter
    {
        if (null === $data['committerDetails']) {
            $committerDetails = null;
        } else {
            $committerDetails = GitHubCommitCommitterDetails::deserialize($data['committerDetails']);
        }

        return new self(
            new GitHubCommitCommitterName($data['name']),
            new GitHubCommitCommitterEmail($data['email']),
            new GitHubCommitDate($data['commitDate']),
            $committerDetails
        );
    }
}
