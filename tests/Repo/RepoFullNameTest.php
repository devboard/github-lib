<?php

declare(strict_types=1);

namespace tests\DevboardLib\GitHub\Repo;

use DevboardLib\GitHub\Account\AccountLogin;
use DevboardLib\GitHub\Repo\RepoFullName;
use DevboardLib\GitHub\Repo\RepoName;

/**
 * @covers \DevboardLib\GitHub\Repo\RepoFullName
 * @group  unit
 */
class RepoFullNameTest extends \PHPUnit_Framework_TestCase
{
    /** @dataProvider provideRepositoryNames */
    public function testItExposesValue(AccountLogin $owner, RepoName $repoName, string $fullName)
    {
        $sut = new RepoFullName($owner, $repoName);
        $this->assertEquals($fullName, $sut->getValue());
    }

    /** @dataProvider provideRepositoryNames */
    public function testItCanBeAutoConvertedToString(AccountLogin $owner, RepoName $repoName, string $fullName)
    {
        $sut = new RepoFullName($owner, $repoName);
        $this->assertEquals($fullName, (string) $sut);
    }

    /** @dataProvider provideRepositoryNames */
    public function testOwnerIsExposedViaGetter(AccountLogin $owner, RepoName $repoName)
    {
        $sut = new RepoFullName($owner, $repoName);
        $this->assertEquals($owner, $sut->getOwner());
    }

    /** @dataProvider provideRepositoryNames */
    public function testRepoNameIsExposedViaGetter(AccountLogin $owner, RepoName $repoName)
    {
        $sut = new RepoFullName($owner, $repoName);
        $this->assertEquals($repoName, $sut->getRepoName());
    }

    /** @dataProvider provideRepositoryNames */
    public function testItCanBeCreatedFromFullName(AccountLogin $owner, RepoName $repoName, string $fullName)
    {
        $sut = RepoFullName::createFromString($fullName);
        $this->assertEquals($fullName, $sut->getValue());
        $this->assertEquals($owner, $sut->getOwner());
        $this->assertEquals($repoName, $sut->getRepoName());
    }

    public function provideRepositoryNames()
    {
        return [
            [new AccountLogin('devboard-test'), new RepoName('super-library'), 'devboard-test/super-library'],
        ];
    }
}
