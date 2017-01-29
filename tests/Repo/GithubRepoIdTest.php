<?php

declare(strict_types=1);

namespace tests\Devboard\Github\Repo;

use Devboard\Github\Repo\GithubRepoId;

/**
 * @covers \Devboard\Github\Repo\GithubRepoId
 * @group  unit
 */
class GithubRepoIdTest extends \PHPUnit_Framework_TestCase
{
    /** @dataProvider provideRepositoryIds */
    public function testItExposesValue(int $id)
    {
        $sut = new GithubRepoId($id);
        $this->assertEquals($id, $sut->getValue());
    }

    /** @dataProvider provideRepositoryIds */
    public function testItCanBeAutoConvertedToString(int $id)
    {
        $sut = new GithubRepoId($id);
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
