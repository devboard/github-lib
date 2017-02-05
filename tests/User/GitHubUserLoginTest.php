<?php

declare(strict_types=1);

namespace tests\Devboard\GitHub\User;

use Devboard\GitHub\User\GitHubUserLogin;

/**
 * @covers \Devboard\GitHub\User\GitHubUserLogin
 * @group  unit
 */
class GitHubUserLoginTest extends \PHPUnit_Framework_TestCase
{
    /** @dataProvider provideUserLogins */
    public function testItExposesValue(string $login)
    {
        $sut = new GitHubUserLogin($login);
        $this->assertEquals($login, $sut->getValue());
    }

    /** @dataProvider provideUserLogins */
    public function testItCanBeAutoConvertedToString(string $login)
    {
        $sut = new GitHubUserLogin($login);
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
