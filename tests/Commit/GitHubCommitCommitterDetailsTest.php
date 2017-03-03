<?php

declare(strict_types=1);

namespace tests\Devboard\GitHub\Commit;

use Devboard\GitHub\Commit\GitHubCommitCommitterDetails;
use Devboard\GitHub\User\GitHubUserApiUrl;
use Devboard\GitHub\User\GitHubUserAvatarUrl;
use Devboard\GitHub\User\GitHubUserGravatarId;
use Devboard\GitHub\User\GitHubUserHtmlUrl;
use Devboard\GitHub\User\GitHubUserId;
use Devboard\GitHub\User\GitHubUserLogin;
use Devboard\GitHub\User\GitHubUserType;
use Devboard\GitHub\User\Type\Organization;
use Devboard\GitHub\User\Type\User;

/**
 * @covers \Devboard\GitHub\Commit\GitHubCommitCommitterDetails
 * @group  unit
 *
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 */
class GitHubCommitCommitterDetailsTest extends \PHPUnit_Framework_TestCase
{
    /** @dataProvider provideArguments */
    public function testCreating(
        GitHubUserId $userId,
        GitHubUserLogin $login,
        GitHubUserType $githubUserType,
        GitHubUserAvatarUrl $avatarUrl,
        GitHubUserGravatarId $gravatarId,
        GitHubUserHtmlUrl $htmlUrl,
        GitHubUserApiUrl $apiUrl,
        bool $siteAdmin
    ) {
        $sut = new GitHubCommitCommitterDetails(
            $userId, $login, $githubUserType, $avatarUrl, $gravatarId, $htmlUrl, $apiUrl, $siteAdmin
        );

        $this->assertSame($userId, $sut->getUserId());
        $this->assertSame($login, $sut->getLogin());
        $this->assertSame($githubUserType, $sut->getGitHubUserType());
        $this->assertSame($avatarUrl, $sut->getAvatarUrl());
        $this->assertSame($gravatarId, $sut->getGravatarId());
        $this->assertSame($htmlUrl, $sut->getHtmlUrl());
        $this->assertSame($apiUrl, $sut->getApiUrl());
        $this->assertSame($siteAdmin, $sut->isSiteAdmin());
    }

    /** @dataProvider provideArguments */
    public function testSerializationAndDeserialization(
        GitHubUserId $userId,
        GitHubUserLogin $login,
        GitHubUserType $githubUserType,
        GitHubUserAvatarUrl $avatarUrl,
        GitHubUserGravatarId $gravatarId,
        GitHubUserHtmlUrl $htmlUrl,
        GitHubUserApiUrl $apiUrl,
        bool $siteAdmin
    ) {
        $sut = new GitHubCommitCommitterDetails(
            $userId, $login, $githubUserType, $avatarUrl, $gravatarId, $htmlUrl, $apiUrl, $siteAdmin
        );

        $serialized = $sut->serialize();

        $this->assertEquals($sut, GitHubCommitCommitterDetails::deserialize($serialized));
    }

    public function provideArguments(): array
    {
        return [
            [
                new GitHubUserId(13507412),
                new GitHubUserLogin('devboard-test'),
                new User(),
                new GitHubUserAvatarUrl('https://avatars.githubusercontent.com/u/13507412?v=3'),
                new GitHubUserGravatarId(''),
                new GitHubUserHtmlUrl('https://github.com/devboard-test'),
                new GitHubUserApiUrl('https://api.github.com/users/devboard-test'),
                false,
            ],
            [
                new GitHubUserId(13396338),
                new GitHubUserLogin('devboard'),
                new Organization(),
                new GitHubUserAvatarUrl('https://avatars.githubusercontent.com/u/13396338?v=3'),
                new GitHubUserGravatarId(''),
                new GitHubUserHtmlUrl('https://github.com/devboard'),
                new GitHubUserApiUrl('https://api.github.com/users/devboard'),
                false,
            ],
            [
                new GitHubUserId(1),
                new GitHubUserLogin('octocat'),
                new User(),
                new GitHubUserAvatarUrl('https://avatars.githubusercontent.com/u/1?v=3'),
                new GitHubUserGravatarId(''),
                new GitHubUserHtmlUrl('https://github.com/octocat'),
                new GitHubUserApiUrl('https://api.github.com/users/octocat'),
                true,
            ],
        ];
    }
}
