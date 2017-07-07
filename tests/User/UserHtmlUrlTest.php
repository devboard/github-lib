<?php

declare(strict_types=1);

namespace tests\DevboardLib\GitHub\User;

use DevboardLib\GitHub\User\UserHtmlUrl;

/**
 * @covers \DevboardLib\GitHub\User\UserHtmlUrl
 * @group  unit
 */
class UserHtmlUrlTest extends \PHPUnit_Framework_TestCase
{
    /** @dataProvider provideUserIds */
    public function testItExposesValue(string $id)
    {
        $sut = new UserHtmlUrl($id);
        $this->assertEquals($id, $sut->getValue());
    }

    /** @dataProvider provideUserIds */
    public function testItCanBeAutoConvertedToString(string $id)
    {
        $sut = new UserHtmlUrl($id);
        $this->assertEquals($id, (string) $sut);
    }

    public function provideUserIds()
    {
        return [
            ['https://github.com/devboard-test'],
        ];
    }
}
