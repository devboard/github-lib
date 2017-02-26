<?php

declare(strict_types=1);

namespace tests\Devboard\GitHub\Fetch\Repo;

use Devboard\GitHub\GitHubRepo;
use Devboard\GitHub\Repo\GitHubRepoApiUrl;
use Devboard\GitHub\Repo\GitHubRepoCreatedAt;
use Devboard\GitHub\Repo\GitHubRepoEndpoints;
use Devboard\GitHub\Repo\GitHubRepoFullName;
use Devboard\GitHub\Repo\GitHubRepoHtmlUrl;
use Devboard\GitHub\Repo\GitHubRepoId;
use Devboard\GitHub\Repo\GitHubRepoName;
use Devboard\GitHub\Repo\GitHubRepoOwner;
use Devboard\GitHub\Repo\GitHubRepoPushedAt;
use Devboard\GitHub\Repo\GitHubRepoSize;
use Devboard\GitHub\Repo\GitHubRepoStats;
use Devboard\GitHub\Repo\GitHubRepoTimestamps;
use Devboard\GitHub\Repo\GitHubRepoUpdatedAt;
use Devboard\GitHub\User\GitHubUserApiUrl;
use Devboard\GitHub\User\GitHubUserAvatarUrl;
use Devboard\GitHub\User\GitHubUserGravatarId;
use Devboard\GitHub\User\GitHubUserHtmlUrl;
use Devboard\GitHub\User\GitHubUserId;
use Devboard\GitHub\User\GitHubUserLogin;
use Devboard\GitHub\User\Type\User;

/**
 * @covers \Devboard\GitHub\GitHubRepo
 * @group  unit
 *
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 */
class GitHubRepoTest extends \PHPUnit_Framework_TestCase
{
    /** @dataProvider provideData */
    public function testGetters(
        GitHubRepoId $id,
        GitHubRepoFullName $fullName,
        GitHubRepoOwner $owner,
        bool $private,
        GitHubRepoEndpoints $endpoints,
        GitHubRepoTimestamps $timestamps,
        GitHubRepoStats $stats
    ) {
        $sut = new GitHubRepo($id, $fullName, $owner, $private, $endpoints, $timestamps, $stats);

        $this->assertEquals($id, $sut->getId());
        $this->assertEquals($fullName, $sut->getFullName());
        $this->assertEquals($owner, $sut->getOwner());
        $this->assertEquals($private, $sut->isPrivate());
        $this->assertEquals(!$private, $sut->isPublic());
        $this->assertEquals($endpoints, $sut->getEndpoints());
        $this->assertEquals($timestamps, $sut->getTimestamps());
        $this->assertEquals($stats, $sut->getStats());
    }

    /** @dataProvider provideData */
    public function testSerializationAndDeserialization(
        GitHubRepoId $id,
        GitHubRepoFullName $fullName,
        GitHubRepoOwner $owner,
        bool $private,
        GitHubRepoEndpoints $endpoints,
        GitHubRepoTimestamps $timestamps,
        GitHubRepoStats $stats
    ) {
        $sut = new GitHubRepo($id, $fullName, $owner, $private, $endpoints, $timestamps, $stats);

        $serialized = $sut->serialize();

        $this->assertEquals($sut, GitHubRepo::deserialize($serialized));
    }

    public function provideData()
    {
        return [
            [
                new GitHubRepoId(1234),
                new GitHubRepoFullName(
                    new GitHubUserLogin('devboard-test'), new GitHubRepoName('super-library')
                ),
                new GitHubRepoOwner(
                    new GitHubUserId(789),
                    new GitHubUserLogin('devboard-test'),
                    new User(),
                    new GitHubUserAvatarUrl('..'),
                    new GitHubUserGravatarId('..'),
                    new GitHubUserHtmlUrl('..'),
                    new GitHubUserApiUrl('..'),
                    false
                ),
                false,
                new GitHubRepoEndpoints(
                    new GitHubRepoApiUrl('..'),
                    new GitHubRepoHtmlUrl('..')
                ),
                new GitHubRepoTimestamps(
                    new GitHubRepoCreatedAt('2017-01-02 11:22:33'),
                    new GitHubRepoUpdatedAt('2017-02-03 15:16:17'),
                    new GitHubRepoPushedAt('2017-03-04 22:23:24')
                ),
                new GitHubRepoStats(1, 2, 3, 4, new GitHubRepoSize(77)),
            ],
        ];
    }
}
