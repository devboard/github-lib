<?php

declare(strict_types=1);

namespace Devboard\GitHub\Commit;

use Devboard\GitHub\Account\GitHubAccountType;
use Devboard\GitHub\Commit\Author\GitHubCommitAuthorEmail;
use Devboard\GitHub\Commit\Author\GitHubCommitAuthorName;
use Devboard\GitHub\User\GitHubUserApiUrl;
use Devboard\GitHub\User\GitHubUserAvatarUrl;
use Devboard\GitHub\User\GitHubUserGravatarId;
use Devboard\GitHub\User\GitHubUserHtmlUrl;
use Devboard\GitHub\User\GitHubUserId;
use Devboard\GitHub\User\GitHubUserLogin;

/**
 * @see GitHubCommitAuthorSpec
 * @see GitHubCommitAuthorTest
 */
class GitHubCommitAuthor
{
    /** @var GitHubCommitAuthorName */
    private $name;
    /** @var GitHubCommitAuthorEmail */
    private $email;
    /** @var GitHubCommitDate */
    private $commitDate;
    /** @var GitHubCommitAuthorDetails */
    private $authorDetails;

    public function __construct(
        GitHubCommitAuthorName $name,
        GitHubCommitAuthorEmail $email,
        GitHubCommitDate $commitDate,
        ?GitHubCommitAuthorDetails $authorDetails
    ) {
        $this->name          = $name;
        $this->email         = $email;
        $this->commitDate    = $commitDate;
        $this->authorDetails = $authorDetails;
    }

    public function getName(): GitHubCommitAuthorName
    {
        return $this->name;
    }

    public function getEmail(): GitHubCommitAuthorEmail
    {
        return $this->email;
    }

    public function getCommitDate(): GitHubCommitDate
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

    public function getAuthorDetails(): ?GitHubCommitAuthorDetails
    {
        return $this->authorDetails;
    }

    public function getUserId(): ?GitHubUserId
    {
        if (null === $this->authorDetails) {
            return null;
        }

        return $this->authorDetails->getUserId();
    }

    public function getLogin(): ?GitHubUserLogin
    {
        if (null === $this->authorDetails) {
            return null;
        }

        return $this->authorDetails->getLogin();
    }

    public function getGitHubAccountType(): ?GitHubAccountType
    {
        if (null === $this->authorDetails) {
            return null;
        }

        return $this->authorDetails->getGitHubAccountType();
    }

    public function getAvatarUrl(): ?GitHubUserAvatarUrl
    {
        if (null === $this->authorDetails) {
            return null;
        }

        return $this->authorDetails->getAvatarUrl();
    }

    public function getGravatarId(): ?GitHubUserGravatarId
    {
        if (null === $this->authorDetails) {
            return null;
        }

        return $this->authorDetails->getGravatarId();
    }

    public function getHtmlUrl(): ?GitHubUserHtmlUrl
    {
        if (null === $this->authorDetails) {
            return null;
        }

        return $this->authorDetails->getHtmlUrl();
    }

    public function getApiUrl(): ?GitHubUserApiUrl
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

    public static function deserialize(array $data): GitHubCommitAuthor
    {
        if (null === $data['authorDetails']) {
            $authorDetails = null;
        } else {
            $authorDetails = GitHubCommitAuthorDetails::deserialize($data['authorDetails']);
        }

        return new self(
            new GitHubCommitAuthorName($data['name']),
            new GitHubCommitAuthorEmail($data['email']),
            new GitHubCommitDate($data['commitDate']),
            $authorDetails
        );
    }
}
