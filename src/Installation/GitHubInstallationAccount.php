<?php

declare(strict_types=1);

namespace Devboard\GitHub\Installation;

use Devboard\GitHub\Account\GitHubAccountApiUrl;
use Devboard\GitHub\Account\GitHubAccountAvatarUrl;
use Devboard\GitHub\Account\GitHubAccountGravatarId;
use Devboard\GitHub\Account\GitHubAccountHtmlUrl;
use Devboard\GitHub\Account\GitHubAccountId;
use Devboard\GitHub\Account\GitHubAccountLogin;
use Devboard\GitHub\Account\GitHubAccountType;
use Devboard\GitHub\Account\GitHubAccountTypeFactory;

/**
 * @see GitHubInstallationAccountSpec
 * @see GitHubInstallationAccountTest
 */
class GitHubInstallationAccount
{
    /** @var GitHubAccountId */
    private $userId;
    /** @var GitHubAccountLogin */
    private $login;
    /** @var GitHubAccountType */
    private $gitHubAccountType;
    /** @var GitHubAccountAvatarUrl */
    private $avatarUrl;
    /** @var GitHubAccountGravatarId */
    private $gravatarId;
    /** @var GitHubAccountHtmlUrl */
    private $htmlUrl;
    /** @var GitHubAccountApiUrl */
    private $apiUrl;
    /** @var bool */
    private $siteAdmin;

    public function __construct(
        GitHubAccountId $userId,
        GitHubAccountLogin $login,
        GitHubAccountType $gitHubAccountType,
        GitHubAccountAvatarUrl $avatarUrl,
        GitHubAccountGravatarId $gravatarId,
        GitHubAccountHtmlUrl $htmlUrl,
        GitHubAccountApiUrl $apiUrl,
        bool $siteAdmin
    ) {
        $this->userId            = $userId;
        $this->login             = $login;
        $this->gitHubAccountType = $gitHubAccountType;
        $this->avatarUrl         = $avatarUrl;
        $this->gravatarId        = $gravatarId;
        $this->htmlUrl           = $htmlUrl;
        $this->apiUrl            = $apiUrl;
        $this->siteAdmin         = $siteAdmin;
    }

    public function getUserId(): GitHubAccountId
    {
        return $this->userId;
    }

    public function getLogin(): GitHubAccountLogin
    {
        return $this->login;
    }

    public function getGitHubAccountType(): GitHubAccountType
    {
        return $this->gitHubAccountType;
    }

    public function getAvatarUrl(): GitHubAccountAvatarUrl
    {
        return $this->avatarUrl;
    }

    public function getGravatarId(): GitHubAccountGravatarId
    {
        return $this->gravatarId;
    }

    public function getHtmlUrl(): GitHubAccountHtmlUrl
    {
        return $this->htmlUrl;
    }

    public function getApiUrl(): GitHubAccountApiUrl
    {
        return $this->apiUrl;
    }

    public function isSiteAdmin(): bool
    {
        return $this->siteAdmin;
    }

    public function serialize(): array
    {
        return [
            'userId'            => $this->userId->getValue(),
            'login'             => (string) $this->login,
            'GitHubAccountType' => (string) $this->gitHubAccountType,
            'avatarUrl'         => (string) $this->avatarUrl,
            'gravatarId'        => (string) $this->gravatarId,
            'htmlUrl'           => (string) $this->htmlUrl,
            'apiUrl'            => (string) $this->apiUrl,
            'siteAdmin'         => $this->siteAdmin,
        ];
    }

    public static function deserialize(array $data): GitHubInstallationAccount
    {
        return new self(
            new GitHubAccountId($data['userId']),
            new GitHubAccountLogin($data['login']),
            GitHubAccountTypeFactory::create($data['GitHubAccountType']),
            new GitHubAccountAvatarUrl($data['avatarUrl']),
            new GitHubAccountGravatarId($data['gravatarId']),
            new GitHubAccountHtmlUrl($data['htmlUrl']),
            new GitHubAccountApiUrl($data['apiUrl']),
            $data['siteAdmin']
        );
    }
}
