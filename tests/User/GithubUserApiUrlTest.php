<?php

declare(strict_types=1);

namespace tests\Devboard\Github\User;

use Devboard\Github\User\GithubUserApiUrl;

/**
 * @covers \Devboard\Github\User\GithubUserApiUrl
 * @group  unit
 */
class GithubUserApiUrlTest extends \PHPUnit_Framework_TestCase
{
    /** @dataProvider provideUserIds */
    public function testItExposesValue(string $id)
    {
        $sut = new GithubUserApiUrl($id);
        $this->assertEquals($id, $sut->getValue());
    }

    /** @dataProvider provideUserIds */
    public function testItCanBeAutoConvertedToString(string $id)
    {
        $sut = new GithubUserApiUrl($id);
        $this->assertEquals($id, (string) $sut);
    }

    public function provideUserIds()
    {
        return [
            ['https://api.github.com/users/devboard-test'],
        ];
    }
}
