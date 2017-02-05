<?php

declare(strict_types=1);

namespace tests\Devboard\GitHub\Repo;

use Devboard\GitHub\Repo\GitHubRepoSize;
use tests\Devboard\GitHub\StatsTest;

/**
 * @covers \Devboard\GitHub\Repo\GitHubRepoSize
 * @covers \Devboard\GitHub\Stats
 * @group  unit
 */
class GitHubRepoSizeTest extends StatsTest
{
    public static function createSut(int $value): GitHubRepoSize
    {
        return new GitHubRepoSize($value);
    }
}
