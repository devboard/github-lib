<?php

declare(strict_types=1);

namespace DevboardLib\GitHub\Commit;

use DevboardLib\GitHub\Account\AccountType;
use DevboardLib\GitHub\Commit\Author\CommitAuthorEmail;
use DevboardLib\GitHub\Commit\Author\CommitAuthorName;
use DevboardLib\GitHub\User\UserApiUrl;
use DevboardLib\GitHub\User\UserAvatarUrl;
use DevboardLib\GitHub\User\UserGravatarId;
use DevboardLib\GitHub\User\UserHtmlUrl;
use DevboardLib\GitHub\User\UserId;
use DevboardLib\GitHub\User\UserLogin;

/**
 * @see CommitAuthorSpec
 * @see CommitAuthorTest
 */
class CommitAuthor
{
    /** @var CommitAuthorName */
    private $name;
    /** @var CommitAuthorEmail */
    private $email;
    /** @var CommitDate */
    private $commitDate;
    /** @var CommitAuthorDetails */
    private $authorDetails;

    public function __construct(
        CommitAuthorName $name,
        CommitAuthorEmail $email,
        CommitDate $commitDate,
        ?CommitAuthorDetails $authorDetails
    ) {
        $this->name          = $name;
        $this->email         = $email;
        $this->commitDate    = $commitDate;
        $this->authorDetails = $authorDetails;
    }

    public function getName(): CommitAuthorName
    {
        return $this->name;
    }

    public function getEmail(): CommitAuthorEmail
    {
        return $this->email;
    }

    public function getCommitDate(): CommitDate
    {
        return $this->commitDate;
    }

    public function hasAuthorDetails(): bool
    {
        if (null === $this->authorDetails) {
            return false;
        }

        return true;
    }

    public function getAuthorDetails(): ?CommitAuthorDetails
    {
        return $this->authorDetails;
    }

    public function getUserId(): ?UserId
    {
        if (null === $this->authorDetails) {
            return null;
        }

        return $this->authorDetails->getUserId();
    }

    public function getLogin(): ?UserLogin
    {
        if (null === $this->authorDetails) {
            return null;
        }

        return $this->authorDetails->getLogin();
    }

    public function getAccountType(): ?AccountType
    {
        if (null === $this->authorDetails) {
            return null;
        }

        return $this->authorDetails->getAccountType();
    }

    public function getAvatarUrl(): ?UserAvatarUrl
    {
        if (null === $this->authorDetails) {
            return null;
        }

        return $this->authorDetails->getAvatarUrl();
    }

    public function getGravatarId(): ?UserGravatarId
    {
        if (null === $this->authorDetails) {
            return null;
        }

        return $this->authorDetails->getGravatarId();
    }

    public function getHtmlUrl(): ?UserHtmlUrl
    {
        if (null === $this->authorDetails) {
            return null;
        }

        return $this->authorDetails->getHtmlUrl();
    }

    public function getApiUrl(): ?UserApiUrl
    {
        if (null === $this->authorDetails) {
            return null;
        }

        return $this->authorDetails->getApiUrl();
    }

    public function isSiteAdmin(): ?bool
    {
        if (null === $this->authorDetails) {
            return null;
        }

        return $this->authorDetails->isSiteAdmin();
    }

    public function serialize(): array
    {
        if (true === $this->hasAuthorDetails()) {
            $authorDetails = $this->authorDetails->serialize();
        } else {
            $authorDetails = null;
        }

        return [
            'name'          => (string) $this->name,
            'email'         => (string) $this->email,
            'commitDate'    => (string) $this->commitDate,
            'authorDetails' => $authorDetails,
        ];
    }

    public static function deserialize(array $data): CommitAuthor
    {
        if (null === $data['authorDetails']) {
            $authorDetails = null;
        } else {
            $authorDetails = CommitAuthorDetails::deserialize($data['authorDetails']);
        }

        return new self(
            new CommitAuthorName($data['name']),
            new CommitAuthorEmail($data['email']),
            new CommitDate($data['commitDate']),
            $authorDetails
        );
    }
}
