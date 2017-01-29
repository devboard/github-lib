<?php

declare(strict_types=1);

namespace tests\Devboard\Github\Repo;

use Devboard\Github\Repo\GithubRepoOpenIssueCount;
use tests\Devboard\Github\StatsTest;

/**
 * @covers \Devboard\Github\Repo\GithubRepoOpenIssueCount
 * @covers \Devboard\Github\Stats
 * @group  unit
 */
class GithubRepoOpenIssueCountTest extends StatsTest
{
    public static function createSut(int $value): GithubRepoOpenIssueCount
    {
        return new GithubRepoOpenIssueCount($value);
    }
}
