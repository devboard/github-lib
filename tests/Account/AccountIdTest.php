<?php

declare(strict_types=1);

namespace tests\DevboardLib\GitHub\Account;

use DevboardLib\GitHub\Account\AccountId;

/**
 * @covers \DevboardLib\GitHub\Account\AccountId
 * @group  unit
 */
class AccountIdTest extends \PHPUnit_Framework_TestCase
{
    /** @dataProvider provideAccountIds */
    public function testItExposesValue(int $id)
    {
        $sut = new AccountId($id);
        $this->assertEquals($id, $sut->getValue());
    }

    /** @dataProvider provideAccountIds */
    public function testItCanBeAutoConvertedToString(int $id)
    {
        $sut = new AccountId($id);
        $this->assertEquals((string) $id, (string) $sut);
    }

    public function provideAccountIds()
    {
        return [
            [200123],
        ];
    }
}
