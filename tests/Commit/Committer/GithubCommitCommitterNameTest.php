<?php

declare(strict_types=1);

namespace tests\Devboard\Github\Commit\Committer;

use Devboard\Github\Commit\Committer\GithubCommitCommitterName;

/**
 * @covers \Devboard\Github\Commit\Committer\GithubCommitCommitterName
 * @group  unit
 */
class GithubCommitCommitterNameTest extends \PHPUnit_Framework_TestCase
{
    /** @dataProvider provideNames */
    public function testItExposesValue(string $name)
    {
        $sut = new GithubCommitCommitterName($name);
        $this->assertEquals($name, $sut->getValue());
    }

    /** @dataProvider provideNames */
    public function testItCanBeAutoConvertedToString(string $name)
    {
        $sut = new GithubCommitCommitterName($name);
        $this->assertEquals($name, (string) $sut);
    }

    public function provideNames()
    {
        return [
            ['John Smith'],
        ];
    }
}
