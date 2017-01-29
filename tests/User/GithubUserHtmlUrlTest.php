<?php

declare(strict_types=1);

namespace tests\Devboard\Github\User;

use Devboard\Github\User\GithubUserHtmlUrl;

/**
 * @covers \Devboard\Github\User\GithubUserHtmlUrl
 * @group  unit
 */
class GithubUserHtmlUrlTest extends \PHPUnit_Framework_TestCase
{
    /** @dataProvider provideUserIds */
    public function testItExposesValue(string $id)
    {
        $sut = new GithubUserHtmlUrl($id);
        $this->assertEquals($id, $sut->getValue());
    }

    /** @dataProvider provideUserIds */
    public function testItCanBeAutoConvertedToString(string $id)
    {
        $sut = new GithubUserHtmlUrl($id);
        $this->assertEquals($id, (string) $sut);
    }

    public function provideUserIds()
    {
        return [
            ['https://github.com/devboard-test'],
        ];
    }
}
