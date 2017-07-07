<?php

declare(strict_types=1);

namespace tests\DevboardLib\GitHub\Repo;

use DevboardLib\GitHub\Repo\RepoSize;
use DevboardLib\GitHub\Repo\RepoStats;

/**
 * @covers \DevboardLib\GitHub\Repo\RepoStats
 * @group  unit
 */
class RepoStatsTest extends \PHPUnit_Framework_TestCase
{
    /** @dataProvider prodivideExamples */
    public function testGetters(
        int $networkCount, int $watchersCount, int $stargazersCount, int $openIssueCount, RepoSize $repoSize
    ) {
        $sut = new RepoStats($networkCount, $watchersCount, $stargazersCount, $openIssueCount, $repoSize);

        $this->assertEquals($networkCount, $sut->getNetworkCount());
        $this->assertEquals($watchersCount, $sut->getWatchersCount());
        $this->assertEquals($stargazersCount, $sut->getStargazersCount());
        $this->assertEquals($openIssueCount, $sut->getOpenIssueCount());
        $this->assertEquals($repoSize, $sut->getRepoSize());
    }

    /** @dataProvider prodivideExamples */
    public function testSerializationAndDeserialization(
        int $networkCount, int $watchersCount, int $stargazersCount, int $openIssueCount, RepoSize $repoSize
    ) {
        $sut = new RepoStats($networkCount, $watchersCount, $stargazersCount, $openIssueCount, $repoSize);

        $serialized = $sut->serialize();

        $this->assertEquals($sut, RepoStats::deserialize($serialized));
    }

    public function prodivideExamples()
    {
        return [
            [1, 2, 3, 4, new RepoSize(4)],
        ];
    }
}
