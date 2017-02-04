<?php

declare(strict_types=1);

namespace tests\Devboard\Github\Fetch\Commit;

use Devboard\Github\Fetch\Commit\GithubCommitAuthor;
use Devboard\Github\Fetch\Commit\GithubCommitAuthorFactory;
use tests\Devboard\Github\Fetch\TestData\TestDataProvider;

/**
 * @covers \Devboard\Github\Fetch\Commit\GithubCommitAuthorFactory
 * @group  unit
 *
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 */
class GithubCommitAuthorFactoryTest extends \PHPUnit_Framework_TestCase
{
    /** @dataProvider provideArguments */
    public function testCreating(array $data)
    {
        $sut = new GithubCommitAuthorFactory();

        $this->assertInstanceOf(GithubCommitAuthor::class, $sut->createFromBranchData($data));
    }

    public function provideArguments(): array
    {
        $provider = new TestDataProvider();

        return $provider->getGitHubBranchesData();
    }
}