<?php

declare(strict_types=1);

namespace tests\DevboardLib\GitHub\Commit;

use DevboardLib\GitHub\Account\AccountType;
use DevboardLib\GitHub\Account\Type\Organization;
use DevboardLib\GitHub\Account\Type\User;
use DevboardLib\GitHub\Commit\CommitCommitterDetails;
use DevboardLib\GitHub\User\UserApiUrl;
use DevboardLib\GitHub\User\UserAvatarUrl;
use DevboardLib\GitHub\User\UserGravatarId;
use DevboardLib\GitHub\User\UserHtmlUrl;
use DevboardLib\GitHub\User\UserId;
use DevboardLib\GitHub\User\UserLogin;

/**
 * @covers \DevboardLib\GitHub\Commit\CommitCommitterDetails
 * @group  unit
 *
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 */
class CommitCommitterDetailsTest extends \PHPUnit_Framework_TestCase
{
    /** @dataProvider provideArguments */
    public function testCreating(
        UserId $userId,
        UserLogin $login,
        AccountType $gitHubAccountType,
        UserAvatarUrl $avatarUrl,
        UserGravatarId $gravatarId,
        UserHtmlUrl $htmlUrl,
        UserApiUrl $apiUrl,
        bool $siteAdmin
    ) {
        $sut = new CommitCommitterDetails(
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
        UserId $userId,
        UserLogin $login,
        AccountType $gitHubAccountType,
        UserAvatarUrl $avatarUrl,
        UserGravatarId $gravatarId,
        UserHtmlUrl $htmlUrl,
        UserApiUrl $apiUrl,
        bool $siteAdmin
    ) {
        $sut = new CommitCommitterDetails(
            $userId, $login, $gitHubAccountType, $avatarUrl, $gravatarId, $htmlUrl, $apiUrl, $siteAdmin
        );

        $serialized = $sut->serialize();

        $this->assertEquals($sut, CommitCommitterDetails::deserialize($serialized));
    }

    public function provideArguments(): array
    {
        return [
            [
                new UserId(13507412),
                new UserLogin('devboard-test'),
                new User(),
                new UserAvatarUrl('https://avatars.Usercontent.com/u/13507412?v=3'),
                new UserGravatarId(''),
                new UserHtmlUrl('https://github.com/devboard-test'),
                new UserApiUrl('https://api.github.com/users/devboard-test'),
                false,
            ],
            [
                new UserId(13396338),
                new UserLogin('devboard'),
                new Organization(),
                new UserAvatarUrl('https://avatars.Usercontent.com/u/13396338?v=3'),
                new UserGravatarId(''),
                new UserHtmlUrl('https://github.com/devboard'),
                new UserApiUrl('https://api.github.com/users/devboard'),
                false,
            ],
            [
                new UserId(1),
                new UserLogin('octocat'),
                new User(),
                new UserAvatarUrl('https://avatars.Usercontent.com/u/1?v=3'),
                new UserGravatarId(''),
                new UserHtmlUrl('https://github.com/octocat'),
                new UserApiUrl('https://api.github.com/users/octocat'),
                true,
            ],
        ];
    }
}
