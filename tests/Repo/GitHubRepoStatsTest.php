<?php

declare(strict_types=1);

namespace tests\Devboard\GitHub\Repo;

use Devboard\GitHub\Repo\GitHubRepoSize;
use Devboard\GitHub\Repo\GitHubRepoStats;

/**
 * @covers \Devboard\GitHub\Repo\GitHubRepoStats
 * @group  unit
 */
class GitHubRepoStatsTest extends \PHPUnit_Framework_TestCase
{
    /** @dataProvider prodivideExamples */
    public function testGetters(
        int $networkCount, int $watchersCount, int $stargazersCount, int $openIssueCount, GitHubRepoSize $repoSize
    ) {
        $sut = new GitHubRepoStats($networkCount, $watchersCount, $stargazersCount, $openIssueCount, $repoSize);

        $this->assertEquals($networkCount, $sut->getNetworkCount());
        $this->assertEquals($watchersCount, $sut->getWatchersCount());
        $this->assertEquals($stargazersCount, $sut->getStargazersCount());
        $this->assertEquals($openIssueCount, $sut->getOpenIssueCount());
        $this->assertEquals($repoSize, $sut->getRepoSize());
    }

    /** @dataProvider prodivideExamples */
    public function testSerializationAndDeserialization(
        int $networkCount, int $watchersCount, int $stargazersCount, int $openIssueCount, GitHubRepoSize $repoSize
    ) {
        $sut = new GitHubRepoStats($networkCount, $watchersCount, $stargazersCount, $openIssueCount, $repoSize);

        $serialized = $sut->serialize();

        $this->assertEquals($sut, GitHubRepoStats::deserialize($serialized));
    }

    public function prodivideExamples()
    {
        return [
            [1, 2, 3, 4, new GitHubRepoSize(4)],
        ];
    }
}
