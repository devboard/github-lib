<?php

declare(strict_types=1);

namespace tests\DevboardLib\GitHub;

use DevboardLib\GitHub\Account\AccountApiUrl;
use DevboardLib\GitHub\Account\AccountAvatarUrl;
use DevboardLib\GitHub\Account\AccountGravatarId;
use DevboardLib\GitHub\Account\AccountHtmlUrl;
use DevboardLib\GitHub\Account\AccountId;
use DevboardLib\GitHub\Account\AccountLogin;
use DevboardLib\GitHub\Account\Type\User;
use DevboardLib\GitHub\GitHubRepo;
use DevboardLib\GitHub\Repo\RepoApiUrl;
use DevboardLib\GitHub\Repo\RepoCreatedAt;
use DevboardLib\GitHub\Repo\RepoEndpoints;
use DevboardLib\GitHub\Repo\RepoFullName;
use DevboardLib\GitHub\Repo\RepoHtmlUrl;
use DevboardLib\GitHub\Repo\RepoId;
use DevboardLib\GitHub\Repo\RepoName;
use DevboardLib\GitHub\Repo\RepoOwner;
use DevboardLib\GitHub\Repo\RepoPushedAt;
use DevboardLib\GitHub\Repo\RepoSize;
use DevboardLib\GitHub\Repo\RepoStats;
use DevboardLib\GitHub\Repo\RepoTimestamps;
use DevboardLib\GitHub\Repo\RepoUpdatedAt;

/**
 * @covers \DevboardLib\GitHub\GitHubRepo
 * @group  unit
 *
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 */
class GitHubRepoTest extends \PHPUnit_Framework_TestCase
{
    /** @dataProvider provideData */
    public function testGetters(
        RepoId $id,
        RepoFullName $fullName,
        ?RepoOwner $ownerDetails,
        bool $private,
        RepoEndpoints $endpoints,
        RepoTimestamps $timestamps,
        RepoStats $stats
    ) {
        $sut = new GitHubRepo($id, $fullName, $ownerDetails, $private, $endpoints, $timestamps, $stats);

        $this->assertEquals($id, $sut->getId());
        $this->assertEquals($fullName, $sut->getFullName());
        $this->assertEquals($ownerDetails, $sut->getOwnerDetails());
        $this->assertEquals($private, $sut->isPrivate());
        $this->assertEquals(!$private, $sut->isPublic());
        $this->assertEquals($endpoints, $sut->getEndpoints());
        $this->assertEquals($timestamps, $sut->getTimestamps());
        $this->assertEquals($stats, $sut->getStats());
    }

    /** @dataProvider provideData */
    public function testSerializationAndDeserialization(
        RepoId $id,
        RepoFullName $fullName,
        ?RepoOwner $ownerDetails,
        bool $private,
        RepoEndpoints $endpoints,
        RepoTimestamps $timestamps,
        RepoStats $stats
    ) {
        $sut = new GitHubRepo($id, $fullName, $ownerDetails, $private, $endpoints, $timestamps, $stats);

        $serialized = $sut->serialize();

        $this->assertEquals($sut, GitHubRepo::deserialize($serialized));
    }

    public function provideData()
    {
        return [
            [
                new RepoId(1234),
                new RepoFullName(
                    new AccountLogin('devboard-test'), new RepoName('super-library')
                ),
                new RepoOwner(
                    new AccountId(789),
                    new AccountLogin('devboard-test'),
                    new User(),
                    new AccountAvatarUrl('..'),
                    new AccountGravatarId('..'),
                    new AccountHtmlUrl('..'),
                    new AccountApiUrl('..'),
                    false
                ),
                false,
                new RepoEndpoints(
                    new RepoApiUrl('..'),
                    new RepoHtmlUrl('..')
                ),
                new RepoTimestamps(
                    new RepoCreatedAt('2017-01-02 11:22:33'),
                    new RepoUpdatedAt('2017-02-03 15:16:17'),
                    new RepoPushedAt('2017-03-04 22:23:24')
                ),
                new RepoStats(1, 2, 3, 4, new RepoSize(77)),
            ],
            [
                new RepoId(1234),
                new RepoFullName(
                    new AccountLogin('devboard-test'), new RepoName('super-library')
                ),
                null,
                false,
                new RepoEndpoints(
                    new RepoApiUrl('..'),
                    new RepoHtmlUrl('..')
                ),
                new RepoTimestamps(
                    new RepoCreatedAt('2017-01-02 11:22:33'),
                    new RepoUpdatedAt('2017-02-03 15:16:17'),
                    new RepoPushedAt('2017-03-04 22:23:24')
                ),
                new RepoStats(1, 2, 3, 4, new RepoSize(77)),
            ],
        ];
    }
}
