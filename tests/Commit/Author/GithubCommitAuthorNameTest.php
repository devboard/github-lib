<?php

declare(strict_types=1);

namespace tests\Devboard\Github\Commit\Author;

use Devboard\Github\Commit\Author\GithubCommitAuthorName;

/**
 * @covers \Devboard\Github\Commit\Author\GithubCommitAuthorName
 * @group  unit
 */
class GithubCommitAuthorNameTest extends \PHPUnit_Framework_TestCase
{
    /** @dataProvider provideNames */
    public function testItExposesValue(string $name)
    {
        $sut = new GithubCommitAuthorName($name);
        $this->assertEquals($name, $sut->getValue());
    }

    /** @dataProvider provideNames */
    public function testItCanBeAutoConvertedToString(string $name)
    {
        $sut = new GithubCommitAuthorName($name);
        $this->assertEquals($name, (string) $sut);
    }

    public function provideNames()
    {
        return [
            ['John Smith'],
        ];
    }
}
