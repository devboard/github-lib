<?php

declare(strict_types=1);

namespace tests\DevboardLib\GitHub\Repo;

use DevboardLib\GitHub\Repo\GitHubRepoSize;
use tests\DevboardLib\GitHub\StatsTest;

/**
 * @covers \DevboardLib\GitHub\Repo\GitHubRepoSize
 * @covers \DevboardLib\GitHub\Stats
 * @group  unit
 */
class GitHubRepoSizeTest extends StatsTest
{
    public static function createSut(int $value): GitHubRepoSize
    {
        return new GitHubRepoSize($value);
    }
}
