<?php

declare(strict_types=1);

namespace tests\DevboardLib\GitHub\Account;

use DevboardLib\GitHub\Account\GitHubAccountLogin;

/**
 * @covers \DevboardLib\GitHub\Account\GitHubAccountLogin
 * @group  unit
 */
class GitHubAccountLoginTest extends \PHPUnit_Framework_TestCase
{
    /** @dataProvider provideAccountLogins */
    public function testItExposesValue(string $login)
    {
        $sut = new GitHubAccountLogin($login);
        $this->assertEquals($login, $sut->getValue());
    }

    /** @dataProvider provideAccountLogins */
    public function testItCanBeAutoConvertedToString(string $login)
    {
        $sut = new GitHubAccountLogin($login);
        $this->assertEquals($login, (string) $sut);
    }

    public function provideAccountLogins()
    {
        return [
            ['devboard-test'],
            ['devboard'],
        ];
    }
}
