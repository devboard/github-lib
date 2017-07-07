<?php

declare(strict_types=1);

namespace tests\DevboardLib\GitHub\Repo;

use DevboardLib\GitHub\Repo\RepoSize;
use tests\DevboardLib\GitHub\StatsTest;

/**
 * @covers \DevboardLib\GitHub\Repo\RepoSize
 * @covers \DevboardLib\GitHub\Stats
 * @group  unit
 */
class RepoSizeTest extends StatsTest
{
    public static function createSut(int $value): RepoSize
    {
        return new RepoSize($value);
    }
}
