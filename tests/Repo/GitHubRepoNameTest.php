<?php

declare(strict_types=1);

namespace tests\Devboard\GitHub\Repo;

use Devboard\GitHub\Repo\GitHubRepoName;

/**
 * @covers \Devboard\GitHub\Repo\GitHubRepoName
 * @group  unit
 */
class GitHubRepoNameTest extends \PHPUnit_Framework_TestCase
{
    /** @dataProvider provideRepositoryNames */
    public function testItExposesValue($name)
    {
        $sut = new GitHubRepoName($name);
        $this->assertEquals($name, $sut->getValue());
    }

    /** @dataProvider provideRepositoryNames */
    public function testItCanBeAutoConvertedToString($name)
    {
        $sut = new GitHubRepoName($name);
        $this->assertEquals($name, (string) $sut);
    }

    public function provideRepositoryNames()
    {
        return [
            ['super-library'],
        ];
    }
}
