<?php

declare(strict_types=1);

namespace tests\DevboardLib\GitHub\Repo;

use DevboardLib\GitHub\Account\AccountApiUrl;
use DevboardLib\GitHub\Account\AccountAvatarUrl;
use DevboardLib\GitHub\Account\AccountGravatarId;
use DevboardLib\GitHub\Account\AccountHtmlUrl;
use DevboardLib\GitHub\Account\AccountId;
use DevboardLib\GitHub\Account\AccountLogin;
use DevboardLib\GitHub\Account\AccountType;
use DevboardLib\GitHub\Account\Type\Organization;
use DevboardLib\GitHub\Account\Type\User;
use DevboardLib\GitHub\Repo\GitHubRepoOwner;

/**
 * @covers \DevboardLib\GitHub\Repo\GitHubRepoOwner
 * @group  unit
 */
class GitHubRepoOwnerTest extends \PHPUnit_Framework_TestCase
{
    /** @dataProvider provideArguments */
    public function testCreating(
        AccountId $userId,
        AccountLogin $login,
        AccountType $gitHubAccountType,
        AccountAvatarUrl $avatarUrl,
        AccountGravatarId $gravatarId,
        AccountHtmlUrl $htmlUrl,
        AccountApiUrl $apiUrl,
        bool $siteAdmin
    ) {
        $sut = new GitHubRepoOwner(
            $userId, $login, $gitHubAccountType, $avatarUrl, $gravatarId, $htmlUrl, $apiUrl, $siteAdmin
        );

        $this->assertSame($userId, $sut->getUserId());
        $this->assertSame($login, $sut->getLogin());
        $this->assertSame($gitHubAccountType, $sut->getAccountType());
        $this->assertSame($avatarUrl, $sut->getAvatarUrl());
        $this->assertSame($gravatarId, $sut->getGravatarId());
        $this->assertSame($htmlUrl, $sut->getHtmlUrl());
        $this->assertSame($apiUrl, $sut->getApiUrl());
        $this->assertSame($siteAdmin, $sut->isSiteAdmin());
    }

    /** @dataProvider provideArguments */
    public function testSerializationAndDeserialization(
        AccountId $userId,
        AccountLogin $login,
        AccountType $gitHubAccountType,
        AccountAvatarUrl $avatarUrl,
        AccountGravatarId $gravatarId,
        AccountHtmlUrl $htmlUrl,
        AccountApiUrl $apiUrl,
        bool $siteAdmin
    ) {
        $sut = new GitHubRepoOwner(
            $userId, $login, $gitHubAccountType, $avatarUrl, $gravatarId, $htmlUrl, $apiUrl, $siteAdmin
        );

        $serialized = $sut->serialize();

        $this->assertEquals($sut, GitHubRepoOwner::deserialize($serialized));
    }

    public function provideArguments(): array
    {
        return [
            [
                new AccountId(13507412),
                new AccountLogin('devboard-test'),
                new User(),
                new AccountAvatarUrl('https://avatars.Usercontent.com/u/13507412?v=3'),
                new AccountGravatarId(''),
                new AccountHtmlUrl('https://github.com/devboard-test'),
                new AccountApiUrl('https://api.github.com/users/devboard-test'),
                false,
            ],
            [
                new AccountId(13396338),
                new AccountLogin('devboard'),
                new Organization(),
                new AccountAvatarUrl('https://avatars.Usercontent.com/u/13396338?v=3'),
                new AccountGravatarId(''),
                new AccountHtmlUrl('https://github.com/devboard'),
                new AccountApiUrl('https://api.github.com/users/devboard'),
                false,
            ],
            [
                new AccountId(1),
                new AccountLogin('octocat'),
                new User(),
                new AccountAvatarUrl('https://avatars.Usercontent.com/u/1?v=3'),
                new AccountGravatarId(''),
                new AccountHtmlUrl('https://github.com/octocat'),
                new AccountApiUrl('https://api.github.com/users/octocat'),
                true,
            ],
        ];
    }
}
