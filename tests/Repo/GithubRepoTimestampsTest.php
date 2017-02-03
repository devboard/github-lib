<?php

declare(strict_types=1);

namespace tests\Devboard\Github\Repo;

use Devboard\Github\Repo\GithubRepoCreatedAt as CreatedAt;
use Devboard\Github\Repo\GithubRepoPushedAt as PushedAt;
use Devboard\Github\Repo\GithubRepoTimestamps;
use Devboard\Github\Repo\GithubRepoUpdatedAt as UpdatedAt;

/**
 * @covers \Devboard\Github\Repo\GithubRepoTimestamps
 * @group  unit
 */
class GithubRepoTimestampsTest extends \PHPUnit_Framework_TestCase
{
    /** @dataProvider provideTimestamps */
    public function testGetters(CreatedAt $createdAt, UpdatedAt $updatedAt, PushedAt $pushedAt)
    {
        $sut = new GithubRepoTimestamps($createdAt, $updatedAt, $pushedAt);

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
