<?php

declare(strict_types=1);

namespace tests\Devboard\GitHub\Repo;

use Devboard\GitHub\Account\GitHubAccountApiUrl;
use Devboard\GitHub\Account\GitHubAccountAvatarUrl;
use Devboard\GitHub\Account\GitHubAccountGravatarId;
use Devboard\GitHub\Account\GitHubAccountHtmlUrl;
use Devboard\GitHub\Account\GitHubAccountId;
use Devboard\GitHub\Account\GitHubAccountLogin;
use Devboard\GitHub\Account\GitHubAccountType;
use Devboard\GitHub\Account\Type\Organization;
use Devboard\GitHub\Account\Type\User;
use Devboard\GitHub\Repo\GitHubRepoOwner;

/**
 * @covers \Devboard\GitHub\Repo\GitHubRepoOwner
 * @group  unit
 */
class GitHubRepoOwnerTest extends \PHPUnit_Framework_TestCase
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
        $sut = new GitHubRepoOwner(
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
