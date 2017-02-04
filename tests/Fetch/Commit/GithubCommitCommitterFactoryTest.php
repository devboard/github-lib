<?php

declare(strict_types=1);

namespace tests\Devboard\Github\Fetch\Commit;

use Devboard\Github\Fetch\Commit\GithubCommitCommitter;
use Devboard\Github\Fetch\Commit\GithubCommitCommitterFactory;
use tests\Devboard\Github\Fetch\TestData\TestDataProvider;

/**
 * @covers \Devboard\Github\Fetch\Commit\GithubCommitCommitterFactory
 * @group  unit
 *
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 */
class GithubCommitCommitterFactoryTest extends \PHPUnit_Framework_TestCase
{
    /** @dataProvider provideArguments */
    public function testCreating(array $data)
    {
        $sut = new GithubCommitCommitterFactory();

        $this->assertInstanceOf(GithubCommitCommitter::class, $sut->createFromBranchData($data));
    }

    public function provideArguments(): array
    {
        $provider = new TestDataProvider();

        return $provider->getGitHubBranchesData();
    }
}
