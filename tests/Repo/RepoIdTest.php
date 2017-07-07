<?php

declare(strict_types=1);

namespace tests\DevboardLib\GitHub\Repo;

use DevboardLib\GitHub\Repo\RepoId;

/**
 * @covers \DevboardLib\GitHub\Repo\RepoId
 * @group  unit
 */
class RepoIdTest extends \PHPUnit_Framework_TestCase
{
    /** @dataProvider provideRepositoryIds */
    public function testItExposesValue(int $id)
    {
        $sut = new RepoId($id);
        $this->assertEquals($id, $sut->getValue());
    }

    /** @dataProvider provideRepositoryIds */
    public function testItCanBeAutoConvertedToString(int $id)
    {
        $sut = new RepoId($id);
        $this->assertEquals($id, $sut->getValue());
        $this->assertEquals((string) $id, (string) $sut);
    }

    public function provideRepositoryIds()
    {
        return [
            [1002332],
        ];
    }
}
