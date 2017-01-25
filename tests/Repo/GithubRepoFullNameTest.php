<?php

declare(strict_types=1);

namespace tests\Devboard\Github\Repo;

use Devboard\Github\Repo\GithubRepoFullName;
use Devboard\Github\Repo\GithubRepoName;
use Devboard\Github\User\GithubUserLogin;

/**
 * @covers \Devboard\Github\Repo\GithubRepoFullName
 * @group  unit
 */
class GithubRepoFullNameTest extends \PHPUnit_Framework_TestCase
{
    /** @dataProvider provideRepositoryNames */
    public function testItExposesValue(GithubUserLogin $owner, GithubRepoName $repoName, string $fullName)
    {
        $sut = new GithubRepoFullName($owner, $repoName);
        $this->assertEquals($fullName, $sut->getValue());
    }

    /** @dataProvider provideRepositoryNames */
    public function testItCanBeAutoConvertedToString(GithubUserLogin $owner, GithubRepoName $repoName, string $fullName)
    {
        $sut = new GithubRepoFullName($owner, $repoName);
        $this->assertEquals($fullName, (string) $sut);
    }

    /** @dataProvider provideRepositoryNames */
    public function testOwnerIsExposedViaGetter(GithubUserLogin $owner, GithubRepoName $repoName)
    {
        $sut = new GithubRepoFullName($owner, $repoName);
        $this->assertEquals($owner, $sut->getOwner());
    }

    /** @dataProvider provideRepositoryNames */
    public function testRepoNameIsExposedViaGetter(GithubUserLogin $owner, GithubRepoName $repoName)
    {
        $sut = new GithubRepoFullName($owner, $repoName);
        $this->assertEquals($repoName, $sut->getRepoName());
    }

    /** @dataProvider provideRepositoryNames */
    public function testItCanBeCreatedFromFullName(GithubUserLogin $owner, GithubRepoName $repoName, string $fullName)
    {
        $sut = GithubRepoFullName::createFromString($fullName);
        $this->assertEquals($fullName, $sut->getValue());
        $this->assertEquals($owner, $sut->getOwner());
        $this->assertEquals($repoName, $sut->getRepoName());
    }

    public function provideRepositoryNames()
    {
        return [
            [new GithubUserLogin('octocat'), new GithubRepoName('super-library'), 'octocat/super-library'],
        ];
    }
}
