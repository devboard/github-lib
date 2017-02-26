<?php

declare(strict_types=1);

namespace tests\Devboard\GitHub\Fetch\Commit;

use Devboard\GitHub\Commit\GitHubCommitAuthor;
use Devboard\GitHub\Fetch\Commit\GitHubCommitAuthorFactory;
use tests\Devboard\GitHub\Fetch\TestData\TestDataProvider;

/**
 * @covers \Devboard\GitHub\Fetch\Commit\GitHubCommitAuthorFactory
 * @group  unit
 *
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 */
class GitHubCommitAuthorFactoryTest extends \PHPUnit_Framework_TestCase
{
    /** @dataProvider provideArguments */
    public function testCreating(array $data)
    {
        $sut = new GitHubCommitAuthorFactory();

        $this->assertInstanceOf(GitHubCommitAuthor::class, $sut->createFromBranchData($data));
    }

    public function provideArguments(): array
    {
        $provider = new TestDataProvider();

        return $provider->getGitHubBranchesData();
    }
}
