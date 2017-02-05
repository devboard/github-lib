<?php

declare(strict_types=1);

namespace tests\Devboard\GitHub\Commit\Committer;

use Devboard\GitHub\Commit\Committer\GitHubCommitCommitterName;

/**
 * @covers \Devboard\GitHub\Commit\Committer\GitHubCommitCommitterName
 * @group  unit
 */
class GitHubCommitCommitterNameTest extends \PHPUnit_Framework_TestCase
{
    /** @dataProvider provideNames */
    public function testItExposesValue(string $name)
    {
        $sut = new GitHubCommitCommitterName($name);
        $this->assertEquals($name, $sut->getValue());
    }

    /** @dataProvider provideNames */
    public function testItCanBeAutoConvertedToString(string $name)
    {
        $sut = new GitHubCommitCommitterName($name);
        $this->assertEquals($name, (string) $sut);
    }

    public function provideNames()
    {
        return [
            ['John Smith'],
        ];
    }
}
