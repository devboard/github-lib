<?php

declare(strict_types=1);

namespace DevboardLib\GitHub\Installation;

use DevboardLib\GitHub\Account\GitHubAccountApiUrl;
use DevboardLib\GitHub\Account\GitHubAccountAvatarUrl;
use DevboardLib\GitHub\Account\GitHubAccountGravatarId;
use DevboardLib\GitHub\Account\GitHubAccountHtmlUrl;
use DevboardLib\GitHub\Account\GitHubAccountId;
use DevboardLib\GitHub\Account\GitHubAccountLogin;
use DevboardLib\GitHub\Account\GitHubAccountType;
use DevboardLib\GitHub\Account\GitHubAccountTypeFactory;

/**
 * @see InstallationAccountSpec
 * @see InstallationAccountTest
 */
class InstallationAccount
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

    public static function deserialize(array $data): InstallationAccount
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
