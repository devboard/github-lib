<?php

declare(strict_types=1);

namespace tests\Devboard\Github\Fetch\Commit;

use Devboard\Github\Fetch\Commit\GithubCommit;
use Devboard\Github\Fetch\Commit\GithubCommitFactory;
use tests\Devboard\Github\Fetch\TestData\TestDataProvider;

/**
 * @covers \Devboard\Github\Fetch\Commit\GithubCommitFactory
 * @group  unit
 *
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 */
class GithubCommitFactoryTest extends \PHPUnit_Framework_TestCase
{
    /** @dataProvider provideArguments */
    public function testCreating(array $data)
    {
        $sut = new GithubCommitFactory();

        $this->assertInstanceOf(GithubCommit::class, $sut->createFromBranchData($data));
    }

    public function provideArguments(): array
    {
        $provider = new TestDataProvider();

        return $provider->getGitHubBranchesData();
    }
}
