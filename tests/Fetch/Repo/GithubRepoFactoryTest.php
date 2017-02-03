<?php

declare(strict_types=1);

namespace tests\Devboard\Github\Fetch\Repo;

use Devboard\Github\Fetch\Repo\GithubRepo;
use Devboard\Github\Fetch\Repo\GithubRepoFactory;
use tests\Devboard\Github\Fetch\TestData\TestDataProvider;

/**
 * @covers \Devboard\Github\Fetch\Repo\GithubRepoFactory
 * @group  unit
 *
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 */
class GithubRepoFactoryTest extends \PHPUnit_Framework_TestCase
{
    /** @dataProvider provideData */
    public function test1(array $data)
    {
        $sut = new GithubRepoFactory();

        $this->assertInstanceOf(GithubRepo::class, $sut->create($data));
    }

    public function provideData()
    {
        $provider = new TestDataProvider();

        return $provider->getGitHubRepoData();
    }
}
