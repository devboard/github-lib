<?php

declare(strict_types=1);

namespace tests\DevboardLib\GitHub\User;

use DevboardLib\GitHub\User\UserLogin;

/**
 * @covers \DevboardLib\GitHub\User\UserLogin
 * @group  unit
 */
class UserLoginTest extends \PHPUnit_Framework_TestCase
{
    /** @dataProvider provideUserLogins */
    public function testItExposesValue(string $login)
    {
        $sut = new UserLogin($login);
        $this->assertEquals($login, $sut->getValue());
    }

    /** @dataProvider provideUserLogins */
    public function testItCanBeAutoConvertedToString(string $login)
    {
        $sut = new UserLogin($login);
        $this->assertEquals($login, (string) $sut);
    }

    public function provideUserLogins()
    {
        return [
            ['devboard-test'],
            ['devboard'],
        ];
    }
}
