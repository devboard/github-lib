<?php

declare(strict_types=1);

namespace DevboardLib\GitHub\Commit;

use DevboardLib\GitHub\Account\AccountType;
use DevboardLib\GitHub\Commit\Committer\CommitCommitterEmail;
use DevboardLib\GitHub\Commit\Committer\CommitCommitterName;
use DevboardLib\GitHub\User\UserApiUrl;
use DevboardLib\GitHub\User\UserAvatarUrl;
use DevboardLib\GitHub\User\UserGravatarId;
use DevboardLib\GitHub\User\UserHtmlUrl;
use DevboardLib\GitHub\User\UserId;
use DevboardLib\GitHub\User\UserLogin;

/**
 * @see CommitCommitterSpec
 * @see CommitCommitterTest
 */
class CommitCommitter
{
    /** @var CommitCommitterName */
    private $name;
    /** @var CommitCommitterEmail */
    private $email;
    /** @var CommitDate */
    private $commitDate;
    /** @var CommitCommitterDetails */
    private $committerDetails;

    public function __construct(
        CommitCommitterName $name,
        CommitCommitterEmail $email,
        CommitDate $commitDate,
        ?CommitCommitterDetails $committerDetails
    ) {
        $this->name             = $name;
        $this->email            = $email;
        $this->commitDate       = $commitDate;
        $this->committerDetails = $committerDetails;
    }

    public function getName(): CommitCommitterName
    {
        return $this->name;
    }

    public function getEmail(): CommitCommitterEmail
    {
        return $this->email;
    }

    public function getCommitDate(): CommitDate
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

    public function getCommitterDetails(): ?CommitCommitterDetails
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

    public function getAccountType(): ?AccountType
    {
        if (null === $this->committerDetails) {
            return null;
        }

        return $this->committerDetails->getAccountType();
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

    public static function deserialize(array $data): CommitCommitter
    {
        if (null === $data['committerDetails']) {
            $committerDetails = null;
        } else {
            $committerDetails = CommitCommitterDetails::deserialize($data['committerDetails']);
        }

        return new self(
            new CommitCommitterName($data['name']),
            new CommitCommitterEmail($data['email']),
            new CommitDate($data['commitDate']),
            $committerDetails
        );
    }
}
