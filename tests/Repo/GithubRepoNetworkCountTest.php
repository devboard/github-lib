<?php

declare(strict_types=1);

namespace tests\Devboard\Github\Repo;

use Devboard\Github\Repo\GithubRepoNetworkCount;
use tests\Devboard\Github\StatsTest;

/**
 * @covers \Devboard\Github\Repo\GithubRepoNetworkCount
 * @covers \Devboard\Github\Stats
 * @group  unit
 */
class GithubRepoNetworkCountTest extends StatsTest
{
    public static function createSut(int $value): GithubRepoNetworkCount
    {
        return new GithubRepoNetworkCount($value);
    }
}
