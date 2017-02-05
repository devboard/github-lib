<?php

declare(strict_types=1);

namespace tests\Devboard\GitHub\Repo;

use Devboard\GitHub\Repo\GitHubRepoFullName;
use Devboard\GitHub\Repo\GitHubRepoName;
use Devboard\GitHub\User\GitHubUserLogin;

/**
 * @covers \Devboard\GitHub\Repo\GitHubRepoFullName
 * @group  unit
 */
class GitHubRepoFullNameTest extends \PHPUnit_Framework_TestCase
{
    /** @dataProvider provideRepositoryNames */
    public function testItExposesValue(GitHubUserLogin $owner, GitHubRepoName $repoName, string $fullName)
    {
        $sut = new GitHubRepoFullName($owner, $repoName);
        $this->assertEquals($fullName, $sut->getValue());
    }

    /** @dataProvider provideRepositoryNames */
    public function testItCanBeAutoConvertedToString(GitHubUserLogin $owner, GitHubRepoName $repoName, string $fullName)
    {
        $sut = new GitHubRepoFullName($owner, $repoName);
        $this->assertEquals($fullName, (string) $sut);
    }

    /** @dataProvider provideRepositoryNames */
    public function testOwnerIsExposedViaGetter(GitHubUserLogin $owner, GitHubRepoName $repoName)
    {
        $sut = new GitHubRepoFullName($owner, $repoName);
        $this->assertEquals($owner, $sut->getOwner());
    }

    /** @dataProvider provideRepositoryNames */
    public function testRepoNameIsExposedViaGetter(GitHubUserLogin $owner, GitHubRepoName $repoName)
    {
        $sut = new GitHubRepoFullName($owner, $repoName);
        $this->assertEquals($repoName, $sut->getRepoName());
    }

    /** @dataProvider provideRepositoryNames */
    public function testItCanBeCreatedFromFullName(GitHubUserLogin $owner, GitHubRepoName $repoName, string $fullName)
    {
        $sut = GitHubRepoFullName::createFromString($fullName);
        $this->assertEquals($fullName, $sut->getValue());
        $this->assertEquals($owner, $sut->getOwner());
        $this->assertEquals($repoName, $sut->getRepoName());
    }

    public function provideRepositoryNames()
    {
        return [
            [new GitHubUserLogin('devboard-test'), new GitHubRepoName('super-library'), 'devboard-test/super-library'],
        ];
    }
}
