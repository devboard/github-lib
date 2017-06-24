<?php

declare(strict_types=1);

namespace tests\Devboard\GitHub\Account;

use Devboard\GitHub\Account\GitHubAccountGravatarId;

/**
 * @covers \Devboard\GitHub\Account\GitHubAccountGravatarId
 * @group  unit
 */
class GitHubAccountGravatarIdTest extends \PHPUnit_Framework_TestCase
{
    /** @dataProvider provideAccountIds */
    public function testItExposesValue(string $id)
    {
        $sut = new GitHubAccountGravatarId($id);
        $this->assertEquals($id, $sut->getValue());
    }

    /** @dataProvider provideAccountIds */
    public function testItCanBeAutoConvertedToString(string $id)
    {
        $sut = new GitHubAccountGravatarId($id);
        $this->assertEquals($id, (string) $sut);
    }

    public function provideAccountIds()
    {
        return [
            ['f9879d71855b5ff21e4963273a886bfc'],
        ];
    }
}
