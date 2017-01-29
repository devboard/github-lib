<?php

declare(strict_types=1);

namespace tests\Devboard\Github\Repo;

use Devboard\Github\Repo\GithubRepoForkCount;
use tests\Devboard\Github\StatsTest;

/**
 * @covers \Devboard\Github\Repo\GithubRepoForkCount
 * @covers \Devboard\Github\Stats
 * @group  unit
 */
class GithubRepoForkCountTest extends StatsTest
{
    public static function createSut(int $value): GithubRepoForkCount
    {
        return new GithubRepoForkCount($value);
    }
}
