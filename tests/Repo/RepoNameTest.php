<?php

declare(strict_types=1);

namespace tests\DevboardLib\GitHub\Repo;

use DevboardLib\GitHub\Repo\RepoName;

/**
 * @covers \DevboardLib\GitHub\Repo\RepoName
 * @group  unit
 */
class RepoNameTest extends \PHPUnit_Framework_TestCase
{
    /** @dataProvider provideRepositoryNames */
    public function testItExposesValue($name)
    {
        $sut = new RepoName($name);
        $this->assertEquals($name, $sut->getValue());
    }

    /** @dataProvider provideRepositoryNames */
    public function testItCanBeAutoConvertedToString($name)
    {
        $sut = new RepoName($name);
        $this->assertEquals($name, (string) $sut);
    }

    public function provideRepositoryNames()
    {
        return [
            ['super-library'],
        ];
    }
}
