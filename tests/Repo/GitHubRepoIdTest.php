<?php

declare(strict_types=1);

namespace tests\DevboardLib\GitHub\Repo;

use DevboardLib\GitHub\Repo\GitHubRepoId;

/**
 * @covers \DevboardLib\GitHub\Repo\GitHubRepoId
 * @group  unit
 */
class GitHubRepoIdTest extends \PHPUnit_Framework_TestCase
{
    /** @dataProvider provideRepositoryIds */
    public function testItExposesValue(int $id)
    {
        $sut = new GitHubRepoId($id);
        $this->assertEquals($id, $sut->getValue());
    }

    /** @dataProvider provideRepositoryIds */
    public function testItCanBeAutoConvertedToString(int $id)
    {
        $sut = new GitHubRepoId($id);
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
