<?php

declare(strict_types=1);

namespace tests\Devboard\Github\Repo;

use Devboard\Github\Repo\GithubRepoWatchersCount;
use tests\Devboard\Github\StatsTest;

/**
 * @covers \Devboard\Github\Repo\GithubRepoWatchersCount
 * @covers \Devboard\Github\Stats
 * @group  unit
 */
class GithubRepoWatchersCountTest extends StatsTest
{
    public static function createSut(int $value): GithubRepoWatchersCount
    {
        return new GithubRepoWatchersCount($value);
    }
}
