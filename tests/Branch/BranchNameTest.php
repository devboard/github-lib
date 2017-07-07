<?php

declare(strict_types=1);

namespace tests\DevboardLib\GitHub\Branch;

use DevboardLib\GitHub\Branch\BranchName;

/**
 * @covers \DevboardLib\GitHub\Branch\BranchName
 * @group  unit
 */
class BranchNameTest extends \PHPUnit_Framework_TestCase
{
    /** @dataProvider provideBranchNames */
    public function testItExposesValue($name)
    {
        $sut = new BranchName($name);
        $this->assertEquals($name, $sut->getValue());
    }

    /** @dataProvider provideBranchNames */
    public function testItCanBeAutoConvertedToString($name)
    {
        $sut = new BranchName($name);
        $this->assertEquals($name, (string) $sut);
    }

    public function provideBranchNames()
    {
        return [
            ['master'],
        ];
    }
}
