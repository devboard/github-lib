<?php

declare(strict_types=1);

namespace tests\Devboard\Github\Branch;

use Devboard\Github\Branch\GithubBranchName;

/**
 * @covers \Devboard\Github\Branch\GithubBranchName
 * @group  unit
 */
class GithubBranchNameTest extends \PHPUnit_Framework_TestCase
{
    /** @dataProvider provideBranchNames */
    public function testItExposesValue($name)
    {
        $sut = new GithubBranchName($name);
        $this->assertEquals($name, $sut->getValue());
    }

    /** @dataProvider provideBranchNames */
    public function testItCanBeAutoConvertedToString($name)
    {
        $sut = new GithubBranchName($name);
        $this->assertEquals($name, (string) $sut);
    }

    public function provideBranchNames()
    {
        return [
            ['master'],
        ];
    }
}
