<?php

declare(strict_types=1);

namespace tests\Devboard\Github\Repo;

use Devboard\Github\Repo\GithubRepoSubscribersCount;
use tests\Devboard\Github\StatsTest;

/**
 * @covers \Devboard\Github\Repo\GithubRepoSubscribersCount
 * @covers \Devboard\Github\Stats
 * @group  unit
 */
class GithubRepoSubscribersCountTest extends StatsTest
{
    public static function createSut(int $value): GithubRepoSubscribersCount
    {
        return new GithubRepoSubscribersCount($value);
    }
}
