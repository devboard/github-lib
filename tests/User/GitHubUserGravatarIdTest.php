<?php

declare(strict_types=1);

namespace tests\DevboardLib\GitHub\User;

use DevboardLib\GitHub\User\GitHubUserGravatarId;

/**
 * @covers \DevboardLib\GitHub\User\GitHubUserGravatarId
 * @group  unit
 */
class GitHubUserGravatarIdTest extends \PHPUnit_Framework_TestCase
{
    /** @dataProvider provideUserIds */
    public function testItExposesValue(string $id)
    {
        $sut = new GitHubUserGravatarId($id);
        $this->assertEquals($id, $sut->getValue());
    }

    /** @dataProvider provideUserIds */
    public function testItCanBeAutoConvertedToString(string $id)
    {
        $sut = new GitHubUserGravatarId($id);
        $this->assertEquals($id, (string) $sut);
    }

    public function provideUserIds()
    {
        return [
            ['f9879d71855b5ff21e4963273a886bfc'],
        ];
    }
}
