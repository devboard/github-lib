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

    /** @dataProvider provideTimestamps */
    public function testSerializationAndDeserialization(CreatedAt $createdAt, UpdatedAt $updatedAt, PushedAt $pushedAt)
    {
        $sut = new GitHubRepoTimestamps($createdAt, $updatedAt, $pushedAt);

        $serialized = $sut->serialize();

        $this->assertEquals($sut, GitHubRepoTimestamps::deserialize($serialized));
    }

    public function provideTimestamps()
    {
        return [
            [
                new CreatedAt('2017-01-02 11:22:33'),
                new UpdatedAt('2017-02-03 15:16:17'),
                new PushedAt('2017-03-04 22:23:24'),
            ],
        ];
    }
}
