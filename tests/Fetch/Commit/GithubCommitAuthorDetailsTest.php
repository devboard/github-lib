<?php

declare(strict_types=1);

namespace tests\Devboard\Github\Fetch\Commit;

use Devboard\Github\Fetch\Commit\GithubCommitAuthorDetails;
use Devboard\Github\User\GithubUserApiUrl;
use Devboard\Github\User\GithubUserAvatarUrl;
use Devboard\Github\User\GithubUserGravatarId;
use Devboard\Github\User\GithubUserHtmlUrl;
use Devboard\Github\User\GithubUserId;
use Devboard\Github\User\GithubUserLogin;
use Devboard\Github\User\GithubUserType;
use Devboard\Github\User\Type\Organization;
use Devboard\Github\User\Type\User;

/**
 * @covers \Devboard\Github\Fetch\Commit\GithubCommitAuthorDetails
 * @group  unit
 *
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 */
class GithubCommitAuthorDetailsTest extends \PHPUnit_Framework_TestCase
{
    /** @dataProvider provideArguments */
    public function testCreating(
        GithubUserId $userId,
        GithubUserLogin $login,
        GithubUserType $githubUserType,
        GithubUserAvatarUrl $avatarUrl,
        GithubUserGravatarId $gravatarId,
        GithubUserHtmlUrl $htmlUrl,
        GithubUserApiUrl $apiUrl,
        bool $siteAdmin
    ) {
        $sut = new GithubCommitAuthorDetails(
            $userId, $login, $githubUserType, $avatarUrl, $gravatarId, $htmlUrl, $apiUrl, $siteAdmin
        );

        $this->assertSame($userId, $sut->getUserId());
        $this->assertSame($login, $sut->getLogin());
        $this->assertSame($githubUserType, $sut->getGithubUserType());
        $this->assertSame($avatarUrl, $sut->getAvatarUrl());
        $this->assertSame($gravatarId, $sut->getGravatarId());
        $this->assertSame($htmlUrl, $sut->getHtmlUrl());
        $this->assertSame($apiUrl, $sut->getApiUrl());
        $this->assertSame($siteAdmin, $sut->isSiteAdmin());
    }

    public function provideArguments(): array
    {
        return [
            [
                new GithubUserId(13507412),
                new GithubUserLogin('devboard-test'),
                new User(),
                new GithubUserAvatarUrl('https://avatars.githubusercontent.com/u/13507412?v=3'),
                new GithubUserGravatarId(''),
                new GithubUserHtmlUrl('https://github.com/devboard-test'),
                new GithubUserApiUrl('https://api.github.com/users/devboard-test'),
                false,
            ],
            [
                new GithubUserId(13396338),
                new GithubUserLogin('devboard'),
                new Organization(),
                new GithubUserAvatarUrl('https://avatars.githubusercontent.com/u/13396338?v=3'),
                new GithubUserGravatarId(''),
                new GithubUserHtmlUrl('https://github.com/devboard'),
                new GithubUserApiUrl('https://api.github.com/users/devboard'),
                false,
            ],
            [
                new GithubUserId(1),
                new GithubUserLogin('octocat'),
                new User(),
                new GithubUserAvatarUrl('https://avatars.githubusercontent.com/u/1?v=3'),
                new GithubUserGravatarId(''),
                new GithubUserHtmlUrl('https://github.com/octocat'),
                new GithubUserApiUrl('https://api.github.com/users/octocat'),
                true,
            ],
        ];
    }
}
