<?php

declare(strict_types=1);

namespace tests\DevboardLib\GitHub\Installation;

use DevboardLib\GitHub\Account\GitHubAccountApiUrl;
use DevboardLib\GitHub\Account\GitHubAccountAvatarUrl;
use DevboardLib\GitHub\Account\GitHubAccountGravatarId;
use DevboardLib\GitHub\Account\GitHubAccountHtmlUrl;
use DevboardLib\GitHub\Account\GitHubAccountId;
use DevboardLib\GitHub\Account\GitHubAccountLogin;
use DevboardLib\GitHub\Account\GitHubAccountType;
use DevboardLib\GitHub\Account\Type\Organization;
use DevboardLib\GitHub\Account\Type\User;
use DevboardLib\GitHub\Installation\InstallationAccount;

/**
 * @covers \DevboardLib\GitHub\Installation\InstallationAccount
 * @group  unit
 */
class InstallationAccountTest extends \PHPUnit_Framework_TestCase
{
    /** @dataProvider provideArguments */
    public function testCreating(
        GitHubAccountId $userId,
        GitHubAccountLogin $login,
        GitHubAccountType $gitHubAccountType,
        GitHubAccountAvatarUrl $avatarUrl,
        GitHubAccountGravatarId $gravatarId,
        GitHubAccountHtmlUrl $htmlUrl,
        GitHubAccountApiUrl $apiUrl,
        bool $siteAdmin
    ) {
        $sut = new InstallationAccount(
            $userId, $login, $gitHubAccountType, $avatarUrl, $gravatarId, $htmlUrl, $apiUrl, $siteAdmin
        );

        $this->assertSame($userId, $sut->getUserId());
        $this->assertSame($login, $sut->getLogin());
        $this->assertSame($gitHubAccountType, $sut->getGitHubAccountType());
        $this->assertSame($avatarUrl, $sut->getAvatarUrl());
        $this->assertSame($gravatarId, $sut->getGravatarId());
        $this->assertSame($htmlUrl, $sut->getHtmlUrl());
        $this->assertSame($apiUrl, $sut->getApiUrl());
        $this->assertSame($siteAdmin, $sut->isSiteAdmin());
    }

    /** @dataProvider provideArguments */
    public function testSerializationAndDeserialization(
        GitHubAccountId $userId,
        GitHubAccountLogin $login,
        GitHubAccountType $gitHubAccountType,
        GitHubAccountAvatarUrl $avatarUrl,
        GitHubAccountGravatarId $gravatarId,
        GitHubAccountHtmlUrl $htmlUrl,
        GitHubAccountApiUrl $apiUrl,
        bool $siteAdmin
    ) {
        $sut = new InstallationAccount(
            $userId, $login, $gitHubAccountType, $avatarUrl, $gravatarId, $htmlUrl, $apiUrl, $siteAdmin
        );

        $serialized = $sut->serialize();

        $this->assertEquals($sut, InstallationAccount::deserialize($serialized));
    }

    public function provideArguments(): array
    {
        return [
            [
                new GitHubAccountId(13507412),
                new GitHubAccountLogin('devboard-test'),
                new User(),
                new GitHubAccountAvatarUrl('https://avatars.githubusercontent.com/u/13507412?v=3'),
                new GitHubAccountGravatarId(''),
                new GitHubAccountHtmlUrl('https://github.com/devboard-test'),
                new GitHubAccountApiUrl('https://api.github.com/users/devboard-test'),
                false,
            ],
            [
                new GitHubAccountId(13396338),
                new GitHubAccountLogin('devboard'),
                new Organization(),
                new GitHubAccountAvatarUrl('https://avatars.githubusercontent.com/u/13396338?v=3'),
                new GitHubAccountGravatarId(''),
                new GitHubAccountHtmlUrl('https://github.com/devboard'),
                new GitHubAccountApiUrl('https://api.github.com/users/devboard'),
                false,
            ],
            [
                new GitHubAccountId(1),
                new GitHubAccountLogin('octocat'),
                new User(),
                new GitHubAccountAvatarUrl('https://avatars.githubusercontent.com/u/1?v=3'),
                new GitHubAccountGravatarId(''),
                new GitHubAccountHtmlUrl('https://github.com/octocat'),
                new GitHubAccountApiUrl('https://api.github.com/users/octocat'),
                true,
            ],
        ];
    }
}
