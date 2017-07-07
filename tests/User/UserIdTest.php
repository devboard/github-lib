<?php

declare(strict_types=1);

namespace tests\DevboardLib\GitHub\User;

use DevboardLib\GitHub\User\UserId;

/**
 * @covers \DevboardLib\GitHub\User\UserId
 * @group  unit
 */
class UserIdTest extends \PHPUnit_Framework_TestCase
{
    /** @dataProvider provideUserIds */
    public function testItExposesValue(int $id)
    {
        $sut = new UserId($id);
        $this->assertEquals($id, $sut->getValue());
    }

    /** @dataProvider provideUserIds */
    public function testItCanBeAutoConvertedToString(int $id)
    {
        $sut = new UserId($id);
        $this->assertEquals((string) $id, (string) $sut);
    }

    public function provideUserIds()
    {
        return [
            [200123],
        ];
    }
}
