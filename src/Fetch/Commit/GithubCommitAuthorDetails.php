<?php

declare(strict_types=1);

namespace Devboard\Github\Fetch\Commit;

use Devboard\Github\User\GithubUserApiUrl;
use Devboard\Github\User\GithubUserAvatarUrl;
use Devboard\Github\User\GithubUserGravatarId;
use Devboard\Github\User\GithubUserHtmlUrl;
use Devboard\Github\User\GithubUserId;
use Devboard\Github\User\GithubUserLogin;
use Devboard\Github\User\GithubUserType;

/**
 * @see GithubCommitAuthorDetailsSpec
 * @see GithubCommitAuthorDetailsTest
 */
class GithubCommitAuthorDetails
{
    /** @var GithubUserId */
    private $userId;
    /** @var GithubUserLogin */
    private $login;
    /** @var GithubUserType */
    private $githubUserType;
    /** @var GithubUserAvatarUrl */
    private $avatarUrl;
    /** @var GithubUserGravatarId */
    private $gravatarId;
    /** @var GithubUserHtmlUrl */
    private $htmlUrl;
    /** @var GithubUserApiUrl */
    private $apiUrl;
    /** @var bool */
    private $siteAdmin;

    public function __construct(
        GithubUserId $userId,
        GithubUserLogin $login,
        GithubUserType $githubUserType,
        GithubUserAvatarUrl $avatarUrl,
        GithubUserGravatarId $gravatarId,
        GithubUserHtmlUrl $htmlUrl,
        GithubUserApiUrl $apiUrl,
        bool $siteAdmin
    ) {
        $this->userId         = $userId;
        $this->login          = $login;
        $this->githubUserType = $githubUserType;
        $this->avatarUrl      = $avatarUrl;
        $this->gravatarId     = $gravatarId;
        $this->htmlUrl        = $htmlUrl;
        $this->apiUrl         = $apiUrl;
        $this->siteAdmin      = $siteAdmin;
    }

    public function getUserId(): GithubUserId
    {
        return $this->userId;
    }

    public function getLogin(): GithubUserLogin
    {
        return $this->login;
    }

    public function getGithubUserType(): GithubUserType
    {
        return $this->githubUserType;
    }

    public function getAvatarUrl(): GithubUserAvatarUrl
    {
        return $this->avatarUrl;
    }

    public function getGravatarId(): GithubUserGravatarId
    {
        return $this->gravatarId;
    }

    public function getHtmlUrl(): GithubUserHtmlUrl
    {
        return $this->htmlUrl;
    }

    public function getApiUrl(): GithubUserApiUrl
    {
        return $this->apiUrl;
    }

    public function isSiteAdmin(): bool
    {
        return $this->siteAdmin;
    }
}
