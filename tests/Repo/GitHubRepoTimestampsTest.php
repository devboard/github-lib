<?php

declare(strict_types=1);

namespace tests\Devboard\GitHub\Repo;

use Devboard\GitHub\Repo\GitHubRepoCreatedAt as CreatedAt;
use Devboard\GitHub\Repo\GitHubRepoPushedAt as PushedAt;
use Devboard\GitHub\Repo\GitHubRepoTimestamps;
use Devboard\GitHub\Repo\GitHubRepoUpdatedAt as UpdatedAt;

/**
 * @covers \Devboard\GitHub\Repo\GitHubRepoTimestamps
 * @group  unit
 */
class GitHubRepoTimestampsTest extends \PHPUnit_Framework_TestCase
{
    /** @dataProvider provideTimestamps */
    public function testGetters(CreatedAt $createdAt, UpdatedAt $updatedAt, PushedAt $pushedAt)
    {
        $sut = new GitHubRepoTimestamps($createdAt, $updatedAt, $pushedAt);

        $this->assertEquals($createdAt, $sut->getCreatedAt());
        $this->assertEquals($updatedAt, $sut->getUpdatedAt());
        $this->assertEquals($pushedAt, $sut->getPushedAt());
    }

    public function provideTimestamps()
    {
        return [
            [new CreatedAt(), new UpdatedAt(), new PushedAt()],
        ];
    }
}
