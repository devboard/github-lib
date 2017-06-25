<?php

declare(strict_types=1);

namespace tests\Devboard\GitHub;

use Devboard\GitHub\Account\GitHubAccountApiUrl;
use Devboard\GitHub\Account\GitHubAccountAvatarUrl;
use Devboard\GitHub\Account\GitHubAccountGravatarId;
use Devboard\GitHub\Account\GitHubAccountHtmlUrl;
use Devboard\GitHub\Account\GitHubAccountId;
use Devboard\GitHub\Account\GitHubAccountLogin;
use Devboard\GitHub\Account\Type\User;
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
