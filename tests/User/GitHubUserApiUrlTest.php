<?php

declare(strict_types=1);

namespace tests\DevboardLib\GitHub\User;

use DevboardLib\GitHub\User\GitHubUserApiUrl;

/**
 * @covers \DevboardLib\GitHub\User\GitHubUserApiUrl
 * @group  unit
 */
class GitHubUserApiUrlTest extends \PHPUnit_Framework_TestCase
{
    /** @dataProvider provideUserIds */
    public function testItExposesValue(string $id)
    {
        $sut = new GitHubUserApiUrl($id);
        $this->assertEquals($id, $sut->getValue());
    }

    /** @dataProvider provideUserIds */
    public function testItCanBeAutoConvertedToString(string $id)
    {
        $sut = new GitHubUserApiUrl($id);
        $this->assertEquals($id, (string) $sut);
    }

    public function provideUserIds()
    {
        return [
            ['https://api.github.com/users/devboard-test'],
        ];
    }
}
