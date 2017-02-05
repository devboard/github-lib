<?php

declare(strict_types=1);

namespace tests\Devboard\GitHub\Commit;

use Devboard\GitHub\Commit\GitHubCommitSha;

/**
 * @covers \Devboard\GitHub\Commit\GitHubCommitSha
 * @group  unit
 */
class GitHubCommitShaTest extends \PHPUnit_Framework_TestCase
{
    /** @dataProvider provideCommitShas */
    public function testItExposesValue(string $sha)
    {
        $sut = new GitHubCommitSha($sha);
        $this->assertEquals($sha, $sut->getValue());
    }

    /** @dataProvider provideCommitShas */
    public function testItCanBeAutoConvertedToString(string $sha)
    {
        $sut = new GitHubCommitSha($sha);
        $this->assertEquals($sha, (string) $sut);
    }

    public function provideCommitShas()
    {
        return [
            ['db911bd3a3dd8bb2ad9eccbcb0a396595a51491d'],
        ];
    }
}
