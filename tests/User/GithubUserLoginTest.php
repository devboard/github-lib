<?php

declare(strict_types=1);

namespace tests\Devboard\Github\User;

use Devboard\Github\User\GithubUserLogin;

/**
 * @covers \Devboard\Github\User\GithubUserLogin
 * @group  unit
 */
class GithubUserLoginTest extends \PHPUnit_Framework_TestCase
{
    /** @dataProvider provideUserLogins */
    public function testItExposesValue($login)
    {
        $sut = new GithubUserLogin($login);
        $this->assertEquals($login, $sut->getValue());
    }

    /** @dataProvider provideUserLogins */
    public function testItCanBeAutoConvertedToString($login)
    {
        $sut = new GithubUserLogin($login);
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
