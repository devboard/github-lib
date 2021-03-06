<?php

declare(strict_types=1);

namespace DevboardLib\GitHub\Commit;

use DevboardLib\GitHub\Account\AccountType;
use DevboardLib\GitHub\Account\AccountTypeFactory;
use DevboardLib\GitHub\User\UserApiUrl;
use DevboardLib\GitHub\User\UserAvatarUrl;
use DevboardLib\GitHub\User\UserGravatarId;
use DevboardLib\GitHub\User\UserHtmlUrl;
use DevboardLib\GitHub\User\UserId;
use DevboardLib\GitHub\User\UserLogin;

/**
 * @see CommitAuthorDetailsSpec
 * @see CommitAuthorDetailsTest
 */
class CommitAuthorDetails
{
    /** @var UserId */
    private $userId;
    /** @var UserLogin */
    private $login;
    /** @var AccountType */
    private $gitHubAccountType;
    /** @var UserAvatarUrl */
    private $avatarUrl;
    /** @var UserGravatarId */
    private $gravatarId;
    /** @var UserHtmlUrl */
    private $htmlUrl;
    /** @var UserApiUrl */
    private $apiUrl;
    /** @var bool */
    private $siteAdmin;

    public function __construct(
        UserId $userId,
        UserLogin $login,
        AccountType $gitHubAccountType,
        UserAvatarUrl $avatarUrl,
        UserGravatarId $gravatarId,
        UserHtmlUrl $htmlUrl,
        UserApiUrl $apiUrl,
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

    public function getUserId(): UserId
    {
        return $this->userId;
    }

    public function getLogin(): UserLogin
    {
        return $this->login;
    }

    public function getAccountType(): AccountType
    {
        return $this->gitHubAccountType;
    }

    public function getAvatarUrl(): UserAvatarUrl
    {
        return $this->avatarUrl;
    }

    public function getGravatarId(): UserGravatarId
    {
        return $this->gravatarId;
    }

    public function getHtmlUrl(): UserHtmlUrl
    {
        return $this->htmlUrl;
    }

    public function getApiUrl(): UserApiUrl
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

    public static function deserialize(array $data): CommitAuthorDetails
    {
        return new self(
            new UserId($data['userId']),
            new UserLogin($data['login']),
            AccountTypeFactory::create($data['accountType']),
            new UserAvatarUrl($data['avatarUrl']),
            new UserGravatarId($data['gravatarId']),
            new UserHtmlUrl($data['htmlUrl']),
            new UserApiUrl($data['apiUrl']),
            $data['siteAdmin']
        );
    }
}
