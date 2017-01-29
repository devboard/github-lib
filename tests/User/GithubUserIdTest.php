<?php

declare(strict_types=1);

namespace tests\Devboard\Github\User;

use Devboard\Github\User\GithubUserId;

/**
 * @covers \Devboard\Github\User\GithubUserId
 * @group  unit
 */
class GithubUserIdTest extends \PHPUnit_Framework_TestCase
{
    /** @dataProvider provideUserIds */
    public function testItExposesValue(int $id)
    {
        $sut = new GithubUserId($id);
        $this->assertEquals($id, $sut->getValue());
    }

    /** @dataProvider provideUserIds */
    public function testItCanBeAutoConvertedToString(int $id)
    {
        $sut = new GithubUserId($id);
        $this->assertEquals((string) $id, (string) $sut);
    }

    public function provideUserIds()
    {
        return [
            [200123],
        ];
    }
}
