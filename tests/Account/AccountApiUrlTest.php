<?php

declare(strict_types=1);

namespace tests\DevboardLib\GitHub\Account;

use DevboardLib\GitHub\Account\AccountApiUrl;

/**
 * @covers \DevboardLib\GitHub\Account\AccountApiUrl
 * @group  unit
 */
class AccountApiUrlTest extends \PHPUnit_Framework_TestCase
{
    /** @dataProvider provideAccountIds */
    public function testItExposesValue(string $id)
    {
        $sut = new AccountApiUrl($id);
        $this->assertEquals($id, $sut->getValue());
    }

    /** @dataProvider provideAccountIds */
    public function testItCanBeAutoConvertedToString(string $id)
    {
        $sut = new AccountApiUrl($id);
        $this->assertEquals($id, (string) $sut);
    }

    public function provideAccountIds()
    {
        return [
            ['https://api.github.com/users/devboard-test'],
        ];
    }
}
