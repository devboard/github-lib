<?php

declare(strict_types=1);

namespace tests\Devboard\Github\Repo;

use Devboard\Github\Repo\GithubRepoSize;
use tests\Devboard\Github\StatsTest;

/**
 * @covers \Devboard\Github\Repo\GithubRepoSize
 * @covers \Devboard\Github\Stats
 * @group  unit
 */
class GithubRepoSizeTest extends StatsTest
{
    public static function createSut(int $value): GithubRepoSize
    {
        return new GithubRepoSize($value);
    }
}
