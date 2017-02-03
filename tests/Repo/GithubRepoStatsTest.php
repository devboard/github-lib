<?php

declare(strict_types=1);

namespace tests\Devboard\Github\Repo;

use Devboard\Github\Repo\GithubRepoSize;
use Devboard\Github\Repo\GithubRepoStats;

/**
 * @covers \Devboard\Github\Repo\GithubRepoStats
 * @group  unit
 */
class GithubRepoStatsTest extends \PHPUnit_Framework_TestCase
{
    /** @dataProvider prodivideExamples */
    public function testGetters(int $networkCount, int $watchersCount, int $stargazersCount, int $openIssueCount, GithubRepoSize $repoSize)
    {
        $sut = new GithubRepoStats($networkCount, $watchersCount, $stargazersCount, $openIssueCount, $repoSize);

        $this->assertEquals(1, $sut->getNetworkCount());
        $this->assertEquals(2, $sut->getWatchersCount());
        $this->assertEquals(3, $sut->getStargazersCount());
        $this->assertEquals(4, $sut->getOpenIssueCount());
        $this->assertEquals($repoSize, $sut->getRepoSize());
    }

    public function prodivideExamples()
    {
        return [
            [1, 2, 3, 4, new GithubRepoSize(4)],
        ];
    }
}
