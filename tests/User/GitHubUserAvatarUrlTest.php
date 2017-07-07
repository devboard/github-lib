<?php

declare(strict_types=1);

namespace tests\DevboardLib\GitHub\User;

use DevboardLib\GitHub\User\GitHubUserAvatarUrl;

/**
 * @covers \DevboardLib\GitHub\User\GitHubUserAvatarUrl
 * @group  unit
 */
class GitHubUserAvatarUrlTest extends \PHPUnit_Framework_TestCase
{
    /** @dataProvider provideUserIds */
    public function testItExposesValue(string $id)
    {
        $sut = new GitHubUserAvatarUrl($id);
        $this->assertEquals($id, $sut->getValue());
    }

    /** @dataProvider provideUserIds */
    public function testItCanBeAutoConvertedToString(string $id)
    {
        $sut = new GitHubUserAvatarUrl($id);
        $this->assertEquals($id, (string) $sut);
    }

    public function provideUserIds()
    {
        return [
            ['https://avatars.githubusercontent.com/u/13507412?v=3'],
        ];
    }
}
