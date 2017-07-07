<?php

declare(strict_types=1);

namespace tests\DevboardLib\GitHub\Account;

use DevboardLib\GitHub\Account\AccountGravatarId;

/**
 * @covers \DevboardLib\GitHub\Account\AccountGravatarId
 * @group  unit
 */
class AccountGravatarIdTest extends \PHPUnit_Framework_TestCase
{
    /** @dataProvider provideAccountIds */
    public function testItExposesValue(string $id)
    {
        $sut = new AccountGravatarId($id);
        $this->assertEquals($id, $sut->getValue());
    }

    /** @dataProvider provideAccountIds */
    public function testItCanBeAutoConvertedToString(string $id)
    {
        $sut = new AccountGravatarId($id);
        $this->assertEquals($id, (string) $sut);
    }

    public function provideAccountIds()
    {
        return [
            ['f9879d71855b5ff21e4963273a886bfc'],
        ];
    }
}
