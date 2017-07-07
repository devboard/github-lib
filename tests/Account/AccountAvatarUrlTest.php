<?php

declare(strict_types=1);

namespace tests\DevboardLib\GitHub\Account;

use DevboardLib\GitHub\Account\AccountAvatarUrl;

/**
 * @covers \DevboardLib\GitHub\Account\AccountAvatarUrl
 * @group  unit
 */
class AccountAvatarUrlTest extends \PHPUnit_Framework_TestCase
{
    /** @dataProvider provideAccountIds */
    public function testItExposesValue(string $id)
    {
        $sut = new AccountAvatarUrl($id);
        $this->assertEquals($id, $sut->getValue());
    }

    /** @dataProvider provideAccountIds */
    public function testItCanBeAutoConvertedToString(string $id)
    {
        $sut = new AccountAvatarUrl($id);
        $this->assertEquals($id, (string) $sut);
    }

    public function provideAccountIds()
    {
        return [
            ['https://avatars.Usercontent.com/u/13507412?v=3'],
        ];
    }
}
