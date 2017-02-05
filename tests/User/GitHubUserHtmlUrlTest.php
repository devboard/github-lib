<?php

declare(strict_types=1);

namespace tests\Devboard\GitHub\User;

use Devboard\GitHub\User\GitHubUserHtmlUrl;

/**
 * @covers \Devboard\GitHub\User\GitHubUserHtmlUrl
 * @group  unit
 */
class GitHubUserHtmlUrlTest extends \PHPUnit_Framework_TestCase
{
    /** @dataProvider provideUserIds */
    public function testItExposesValue(string $id)
    {
        $sut = new GitHubUserHtmlUrl($id);
        $this->assertEquals($id, $sut->getValue());
    }

    /** @dataProvider provideUserIds */
    public function testItCanBeAutoConvertedToString(string $id)
    {
        $sut = new GitHubUserHtmlUrl($id);
        $this->assertEquals($id, (string) $sut);
    }

    public function provideUserIds()
    {
        return [
            ['https://github.com/devboard-test'],
        ];
    }
}
