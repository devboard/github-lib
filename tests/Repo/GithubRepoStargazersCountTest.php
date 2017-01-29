<?php

declare(strict_types=1);

namespace tests\Devboard\Github\Repo;

use Devboard\Github\Repo\GithubRepoStargazersCount;
use tests\Devboard\Github\StatsTest;

/**
 * @covers \Devboard\Github\Repo\GithubRepoStargazersCount
 * @covers \Devboard\Github\Stats
 * @group  unit
 */
class GithubRepoStargazersCountTest extends StatsTest
{
    public static function createSut(int $value): GithubRepoStargazersCount
    {
        return new GithubRepoStargazersCount($value);
    }
}
