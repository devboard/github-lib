<?php

declare(strict_types=1);

namespace tests\Devboard\Github\Repo;

use Devboard\Github\Repo\GithubRepoName;

/**
 * @covers \Devboard\Github\Repo\GithubRepoName
 * @group  unit
 */
class GithubRepoNameTest extends \PHPUnit_Framework_TestCase
{
    /** @dataProvider provideRepositoryNames */
    public function testItExposesValue($name)
    {
        $sut = new GithubRepoName($name);
        $this->assertEquals($name, $sut->getValue());
    }

    /** @dataProvider provideRepositoryNames */
    public function testItCanBeAutoConvertedToString($name)
    {
        $sut = new GithubRepoName($name);
        $this->assertEquals($name, (string) $sut);
    }

    public function provideRepositoryNames()
    {
        return [
            ['super-library'],
        ];
    }
}
