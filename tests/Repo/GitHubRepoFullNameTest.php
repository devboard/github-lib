<?php

declare(strict_types=1);

namespace tests\DevboardLib\GitHub\Repo;

use DevboardLib\GitHub\Account\AccountLogin;
use DevboardLib\GitHub\Repo\GitHubRepoFullName;
use DevboardLib\GitHub\Repo\GitHubRepoName;

/**
 * @covers \DevboardLib\GitHub\Repo\GitHubRepoFullName
 * @group  unit
 */
class GitHubRepoFullNameTest extends \PHPUnit_Framework_TestCase
{
    /** @dataProvider provideRepositoryNames */
    public function testItExposesValue(AccountLogin $owner, GitHubRepoName $repoName, string $fullName)
    {
        $sut = new GitHubRepoFullName($owner, $repoName);
        $this->assertEquals($fullName, $sut->getValue());
    }

    /** @dataProvider provideRepositoryNames */
    public function testItCanBeAutoConvertedToString(AccountLogin $owner, GitHubRepoName $repoName, string $fullName)
    {
        $sut = new GitHubRepoFullName($owner, $repoName);
        $this->assertEquals($fullName, (string) $sut);
    }

    /** @dataProvider provideRepositoryNames */
    public function testOwnerIsExposedViaGetter(AccountLogin $owner, GitHubRepoName $repoName)
    {
        $sut = new GitHubRepoFullName($owner, $repoName);
        $this->assertEquals($owner, $sut->getOwner());
    }

    /** @dataProvider provideRepositoryNames */
    public function testRepoNameIsExposedViaGetter(AccountLogin $owner, GitHubRepoName $repoName)
    {
        $sut = new GitHubRepoFullName($owner, $repoName);
        $this->assertEquals($repoName, $sut->getRepoName());
    }

    /** @dataProvider provideRepositoryNames */
    public function testItCanBeCreatedFromFullName(AccountLogin $owner, GitHubRepoName $repoName, string $fullName)
    {
        $sut = GitHubRepoFullName::createFromString($fullName);
        $this->assertEquals($fullName, $sut->getValue());
        $this->assertEquals($owner, $sut->getOwner());
        $this->assertEquals($repoName, $sut->getRepoName());
    }

    public function provideRepositoryNames()
    {
        return [
            [new AccountLogin('devboard-test'), new GitHubRepoName('super-library'), 'devboard-test/super-library'],
        ];
    }
}
