<?php

declare(strict_types=1);

namespace tests\Devboard\Github\Fetch\Repo;

use Devboard\Github\Fetch\Repo\GithubRepo;
use Devboard\Github\Repo\GithubRepoApiUrl;
use Devboard\Github\Repo\GithubRepoCreatedAt;
use Devboard\Github\Repo\GithubRepoEndpoints;
use Devboard\Github\Repo\GithubRepoFullName;
use Devboard\Github\Repo\GithubRepoHtmlUrl;
use Devboard\Github\Repo\GithubRepoId;
use Devboard\Github\Repo\GithubRepoName;
use Devboard\Github\Repo\GithubRepoOwner;
use Devboard\Github\Repo\GithubRepoPushedAt;
use Devboard\Github\Repo\GithubRepoSize;
use Devboard\Github\Repo\GithubRepoStats;
use Devboard\Github\Repo\GithubRepoTimestamps;
use Devboard\Github\Repo\GithubRepoUpdatedAt;
use Devboard\Github\User\GithubUserApiUrl;
use Devboard\Github\User\GithubUserAvatarUrl;
use Devboard\Github\User\GithubUserGravatarId;
use Devboard\Github\User\GithubUserHtmlUrl;
use Devboard\Github\User\GithubUserId;
use Devboard\Github\User\GithubUserLogin;
use Devboard\Github\User\Type\User;

/**
 * @covers \Devboard\Github\Fetch\Repo\GithubRepo
 * @group  unit
 *
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 */
class GithubRepoTest extends \PHPUnit_Framework_TestCase
{
    /** @dataProvider provideData */
    public function testGetters(
        GithubRepoId $id,
        GithubRepoFullName $fullName,
        GithubRepoOwner $owner,
        bool $private,
        GithubRepoEndpoints $endpoints,
        GithubRepoTimestamps $timestamps,
        GithubRepoStats $stats
    ) {
        $sut = new GithubRepo($id, $fullName, $owner, $private, $endpoints, $timestamps, $stats);

        $this->assertEquals($id, $sut->getId());
        $this->assertEquals($fullName, $sut->getFullName());
        $this->assertEquals($owner, $sut->getOwner());
    }

    public function provideData()
    {
        return [
            [
                new GithubRepoId(1234),
                new GithubRepoFullName(
                    new GithubUserLogin('devboard-test'), new GithubRepoName('super-library')
                ),
                new GithubRepoOwner(
                    new GithubUserId(789),
                    new GithubUserLogin('devboard-test'),
                    new User(),
                    new GithubUserAvatarUrl('..'),
                    new GithubUserGravatarId('..'),
                    new GithubUserHtmlUrl('..'),
                    new GithubUserApiUrl('..'),
                    false
                ),
                false,
                new GithubRepoEndpoints(
                    new GithubRepoApiUrl('..'),
                    new GithubRepoHtmlUrl('..')
                ),
                new GithubRepoTimestamps(
                    new GithubRepoCreatedAt(),
                    new GithubRepoUpdatedAt(),
                    new GithubRepoPushedAt()
                ),
                new GithubRepoStats(1, 2, 3, 4, new GithubRepoSize(77)),
            ],
        ];
    }
}
