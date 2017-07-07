<?php

declare(strict_types=1);

namespace tests\DevboardLib\GitHub\Repo;

use DevboardLib\GitHub\Repo\RepoCreatedAt as CreatedAt;
use DevboardLib\GitHub\Repo\RepoPushedAt as PushedAt;
use DevboardLib\GitHub\Repo\RepoTimestamps;
use DevboardLib\GitHub\Repo\RepoUpdatedAt as UpdatedAt;

/**
 * @covers \DevboardLib\GitHub\Repo\RepoTimestamps
 * @group  unit
 */
class RepoTimestampsTest extends \PHPUnit_Framework_TestCase
{
    /** @dataProvider provideTimestamps */
    public function testGetters(CreatedAt $createdAt, UpdatedAt $updatedAt, PushedAt $pushedAt)
    {
        $sut = new RepoTimestamps($createdAt, $updatedAt, $pushedAt);

        $this->assertEquals($createdAt, $sut->getCreatedAt());
        $this->assertEquals($updatedAt, $sut->getUpdatedAt());
        $this->assertEquals($pushedAt, $sut->getPushedAt());
    }

    /** @dataProvider provideTimestamps */
    public function testSerializationAndDeserialization(CreatedAt $createdAt, UpdatedAt $updatedAt, PushedAt $pushedAt)
    {
        $sut = new RepoTimestamps($createdAt, $updatedAt, $pushedAt);

        $serialized = $sut->serialize();

        $this->assertEquals($sut, RepoTimestamps::deserialize($serialized));
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
