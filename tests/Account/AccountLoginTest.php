<?php

declare(strict_types=1);

namespace tests\DevboardLib\GitHub\Account;

use DevboardLib\GitHub\Account\AccountLogin;

/**
 * @covers \DevboardLib\GitHub\Account\AccountLogin
 * @group  unit
 */
class AccountLoginTest extends \PHPUnit_Framework_TestCase
{
    /** @dataProvider provideAccountLogins */
    public function testItExposesValue(string $login)
    {
        $sut = new AccountLogin($login);
        $this->assertEquals($login, $sut->getValue());
    }

    /** @dataProvider provideAccountLogins */
    public function testItCanBeAutoConvertedToString(string $login)
    {
        $sut = new AccountLogin($login);
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
