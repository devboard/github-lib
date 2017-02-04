<?php

declare(strict_types=1);

namespace tests\Devboard\Github\Fetch\Branch;

use Devboard\Github\Fetch\Branch\GithubBranch;
use Devboard\Github\Fetch\Branch\GithubBranchFactory;
use Devboard\Github\Repo\GithubRepoFullName;
use tests\Devboard\Github\Fetch\TestData\TestDataProvider;

/**
 * @covers \Devboard\Github\Fetch\Branch\GithubBranchFactory
 * @group  unit
 *
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 */
class GithubBranchFactoryTest extends \PHPUnit_Framework_TestCase
{
    /** @dataProvider provideArguments */
    public function testCreating(array $data, GithubRepoFullName $repoFullName)
    {
        $sut = new GithubBranchFactory();

        $this->assertInstanceOf(GithubBranch::class, $sut->createFromBranchData($repoFullName, $data));
    }

    public function provideArguments(): array
    {
        $provider = new TestDataProvider();

        return $provider->getGitHubBranchesData();
    }
}
