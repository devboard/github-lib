<?php

declare(strict_types=1);

namespace tests\DevboardLib\GitHub\Branch;

use DevboardLib\GitHub\Branch\GitHubBranchName;

/**
 * @covers \DevboardLib\GitHub\Branch\GitHubBranchName
 * @group  unit
 */
class GitHubBranchNameTest extends \PHPUnit_Framework_TestCase
{
    /** @dataProvider provideBranchNames */
    public function testItExposesValue($name)
    {
        $sut = new GitHubBranchName($name);
        $this->assertEquals($name, $sut->getValue());
    }

    /** @dataProvider provideBranchNames */
    public function testItCanBeAutoConvertedToString($name)
    {
        $sut = new GitHubBranchName($name);
        $this->assertEquals($name, (string) $sut);
    }

    public function provideBranchNames()
    {
        return [
            ['master'],
        ];
    }
}
