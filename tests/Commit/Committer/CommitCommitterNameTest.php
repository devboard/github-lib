<?php

declare(strict_types=1);

namespace tests\DevboardLib\GitHub\Commit\Committer;

use DevboardLib\GitHub\Commit\Committer\CommitCommitterName;

/**
 * @covers \DevboardLib\GitHub\Commit\Committer\CommitCommitterName
 * @group  unit
 */
class CommitCommitterNameTest extends \PHPUnit_Framework_TestCase
{
    /** @dataProvider provideNames */
    public function testItExposesValue(string $name)
    {
        $sut = new CommitCommitterName($name);
        $this->assertEquals($name, $sut->getValue());
    }

    /** @dataProvider provideNames */
    public function testItCanBeAutoConvertedToString(string $name)
    {
        $sut = new CommitCommitterName($name);
        $this->assertEquals($name, (string) $sut);
    }

    public function provideNames()
    {
        return [
            ['John Smith'],
        ];
    }
}
