<?php

declare(strict_types=1);

namespace tests\Devboard\GitHub\Fetch\Commit;

use Devboard\GitHub\Commit\GitHubCommitCommitter;
use Devboard\GitHub\Fetch\Commit\GitHubCommitCommitterFactory;
use tests\Devboard\GitHub\Fetch\TestData\TestDataProvider;

/**
 * @covers \Devboard\GitHub\Fetch\Commit\GitHubCommitCommitterFactory
 * @group  unit
 *
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 */
class GitHubCommitCommitterFactoryTest extends \PHPUnit_Framework_TestCase
{
    /** @dataProvider provideArguments */
    public function testCreating(array $data)
    {
        $sut = new GitHubCommitCommitterFactory();

        $this->assertInstanceOf(GitHubCommitCommitter::class, $sut->createFromBranchData($data));
    }

    public function provideArguments(): array
    {
        $provider = new TestDataProvider();

        return $provider->getGitHubBranchesData();
    }
}
