<?php

declare(strict_types=1);

namespace tests\Devboard\GitHub\Fetch\Branch;

use Devboard\GitHub\Fetch\Branch\GitHubBranch;
use Devboard\GitHub\Fetch\Branch\GitHubBranchFactory;
use Devboard\GitHub\Repo\GitHubRepoFullName;
use tests\Devboard\GitHub\Fetch\TestData\TestDataProvider;

/**
 * @covers \Devboard\GitHub\Fetch\Branch\GitHubBranchFactory
 * @group  unit
 *
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 */
class GitHubBranchFactoryTest extends \PHPUnit_Framework_TestCase
{
    /** @dataProvider provideArguments */
    public function testCreating(array $data, GitHubRepoFullName $repoFullName)
    {
        $sut = new GitHubBranchFactory();

        $this->assertInstanceOf(GitHubBranch::class, $sut->createFromBranchData($repoFullName, $data));
    }

    public function provideArguments(): array
    {
        $provider = new TestDataProvider();

        return $provider->getGitHubBranchesData();
    }
}
