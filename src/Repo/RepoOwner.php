<?php

declare(strict_types=1);

namespace DevboardLib\GitHub\Repo;

use DevboardLib\GitHub\Account\AccountApiUrl;
use DevboardLib\GitHub\Account\AccountAvatarUrl;
use DevboardLib\GitHub\Account\AccountGravatarId;
use DevboardLib\GitHub\Account\AccountHtmlUrl;
use DevboardLib\GitHub\Account\AccountId;
use DevboardLib\GitHub\Account\AccountLogin;
use DevboardLib\GitHub\Account\AccountType;
use DevboardLib\GitHub\Account\AccountTypeFactory;

/**
 * @see RepoOwnerSpec
 * @see RepoOwnerTest
 */
class RepoOwner
{
    /** @var AccountId */
    private $userId;
    /** @var AccountLogin */
    private $login;
    /** @var AccountType */
    private $gitHubAccountType;
    /** @var AccountAvatarUrl */
    private $avatarUrl;
    /** @var AccountGravatarId */
    private $gravatarId;
    /** @var AccountHtmlUrl */
    private $htmlUrl;
    /** @var AccountApiUrl */
    private $apiUrl;
    /** @var bool */
    private $siteAdmin;

    public function __construct(
        AccountId $userId,
        AccountLogin $login,
        AccountType $gitHubAccountType,
        AccountAvatarUrl $avatarUrl,
        AccountGravatarId $gravatarId,
        AccountHtmlUrl $htmlUrl,
        AccountApiUrl $apiUrl,
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

    public function getUserId(): AccountId
    {
        return $this->userId;
    }

    public function getLogin(): AccountLogin
    {
        return $this->login;
    }

    public function getAccountType(): AccountType
    {
        return $this->gitHubAccountType;
    }

    public function getAvatarUrl(): AccountAvatarUrl
    {
        return $this->avatarUrl;
    }

    public function getGravatarId(): AccountGravatarId
    {
        return $this->gravatarId;
    }

    public function getHtmlUrl(): AccountHtmlUrl
    {
        return $this->htmlUrl;
    }

    public function getApiUrl(): AccountApiUrl
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
            'userId'      => $this->userId->getValue(),
            'login'       => (string) $this->login,
            'accountType' => (string) $this->gitHubAccountType,
            'avatarUrl'   => (string) $this->avatarUrl,
            'gravatarId'  => (string) $this->gravatarId,
            'htmlUrl'     => (string) $this->htmlUrl,
            'apiUrl'      => (string) $this->apiUrl,
            'siteAdmin'   => $this->siteAdmin,
        ];
    }

    public static function deserialize(array $data): RepoOwner
    {
        return new self(
            new AccountId($data['userId']),
            new AccountLogin($data['login']),
            AccountTypeFactory::create($data['accountType']),
            new AccountAvatarUrl($data['avatarUrl']),
            new AccountGravatarId($data['gravatarId']),
            new AccountHtmlUrl($data['htmlUrl']),
            new AccountApiUrl($data['apiUrl']),
            $data['siteAdmin']
        );
    }
}
