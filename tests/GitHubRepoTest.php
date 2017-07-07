<?php

declare(strict_types=1);

namespace tests\DevboardLib\GitHub;

use DevboardLib\GitHub\Account\GitHubAccountApiUrl;
use DevboardLib\GitHub\Account\GitHubAccountAvatarUrl;
use DevboardLib\GitHub\Account\GitHubAccountGravatarId;
use DevboardLib\GitHub\Account\GitHubAccountHtmlUrl;
use DevboardLib\GitHub\Account\GitHubAccountId;
use DevboardLib\GitHub\Account\GitHubAccountLogin;
use DevboardLib\GitHub\Account\Type\User;
use DevboardLib\GitHub\GitHubRepo;
use DevboardLib\GitHub\Repo\GitHubRepoApiUrl;
use DevboardLib\GitHub\Repo\GitHubRepoCreatedAt;
use DevboardLib\GitHub\Repo\GitHubRepoEndpoints;
use DevboardLib\GitHub\Repo\GitHubRepoFullName;
use DevboardLib\GitHub\Repo\GitHubRepoHtmlUrl;
use DevboardLib\GitHub\Repo\GitHubRepoId;
use DevboardLib\GitHub\Repo\GitHubRepoName;
use DevboardLib\GitHub\Repo\GitHubRepoOwner;
use DevboardLib\GitHub\Repo\GitHubRepoPushedAt;
use DevboardLib\GitHub\Repo\GitHubRepoSize;
use DevboardLib\GitHub\Repo\GitHubRepoStats;
use DevboardLib\GitHub\Repo\GitHubRepoTimestamps;
use DevboardLib\GitHub\Repo\GitHubRepoUpdatedAt;

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
        GitHubRepoId $id,
        GitHubRepoFullName $fullName,
        ?GitHubRepoOwner $ownerDetails,
        bool $private,
        GitHubRepoEndpoints $endpoints,
        GitHubRepoTimestamps $timestamps,
        GitHubRepoStats $stats
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
        GitHubRepoId $id,
        GitHubRepoFullName $fullName,
        ?GitHubRepoOwner $ownerDetails,
        bool $private,
        GitHubRepoEndpoints $endpoints,
        GitHubRepoTimestamps $timestamps,
        GitHubRepoStats $stats
    ) {
        $sut = new GitHubRepo($id, $fullName, $ownerDetails, $private, $endpoints, $timestamps, $stats);

        $serialized = $sut->serialize();

        $this->assertEquals($sut, GitHubRepo::deserialize($serialized));
    }

    public function provideData()
    {
        return [
            [
                new GitHubRepoId(1234),
                new GitHubRepoFullName(
                    new GitHubAccountLogin('devboard-test'), new GitHubRepoName('super-library')
                ),
                new GitHubRepoOwner(
                    new GitHubAccountId(789),
                    new GitHubAccountLogin('devboard-test'),
                    new User(),
                    new GitHubAccountAvatarUrl('..'),
                    new GitHubAccountGravatarId('..'),
                    new GitHubAccountHtmlUrl('..'),
                    new GitHubAccountApiUrl('..'),
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
            [
                new GitHubRepoId(1234),
                new GitHubRepoFullName(
                    new GitHubAccountLogin('devboard-test'), new GitHubRepoName('super-library')
                ),
                null,
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
