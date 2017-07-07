<?php

declare(strict_types=1);

namespace tests\DevboardLib\GitHub\Commit\Author;

use DevboardLib\GitHub\Commit\Author\GitHubCommitAuthorName;

/**
 * @covers \DevboardLib\GitHub\Commit\Author\GitHubCommitAuthorName
 * @group  unit
 */
class GitHubCommitAuthorNameTest extends \PHPUnit_Framework_TestCase
{
    /** @dataProvider provideNames */
    public function testItExposesValue(string $name)
    {
        $sut = new GitHubCommitAuthorName($name);
        $this->assertEquals($name, $sut->getValue());
    }

    /** @dataProvider provideNames */
    public function testItCanBeAutoConvertedToString(string $name)
    {
        $sut = new GitHubCommitAuthorName($name);
        $this->assertEquals($name, (string) $sut);
    }

    public function provideNames()
    {
        return [
            ['John Smith'],
        ];
    }
}
