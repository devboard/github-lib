<?php

declare(strict_types=1);

namespace tests\Devboard\GitHub\Fetch\Commit;

use Devboard\GitHub\Fetch\Commit\GitHubCommit;
use Devboard\GitHub\Fetch\Commit\GitHubCommitFactory;
use tests\Devboard\GitHub\Fetch\TestData\TestDataProvider;

/**
 * @covers \Devboard\GitHub\Fetch\Commit\GitHubCommitFactory
 * @group  unit
 *
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 */
class GitHubCommitFactoryTest extends \PHPUnit_Framework_TestCase
{
    /** @dataProvider provideArguments */
    public function testCreating(array $data)
    {
        $sut = new GitHubCommitFactory();

        $this->assertInstanceOf(GitHubCommit::class, $sut->createFromBranchData($data));
    }

    public function provideArguments(): array
    {
        $provider = new TestDataProvider();

        return $provider->getGitHubBranchesData();
    }
}
