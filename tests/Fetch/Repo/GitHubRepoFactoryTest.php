<?php

declare(strict_types=1);

namespace tests\Devboard\GitHub\Fetch\Repo;

use Devboard\GitHub\Fetch\Repo\GitHubRepo;
use Devboard\GitHub\Fetch\Repo\GitHubRepoFactory;
use tests\Devboard\GitHub\Fetch\TestData\TestDataProvider;

/**
 * @covers \Devboard\GitHub\Fetch\Repo\GitHubRepoFactory
 * @group  unit
 *
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 */
class GitHubRepoFactoryTest extends \PHPUnit_Framework_TestCase
{
    /** @dataProvider provideData */
    public function test1(array $data)
    {
        $sut = new GitHubRepoFactory();

        $this->assertInstanceOf(GitHubRepo::class, $sut->create($data));
    }

    public function provideData()
    {
        $provider = new TestDataProvider();

        return $provider->getGitHubRepoData();
    }
}
