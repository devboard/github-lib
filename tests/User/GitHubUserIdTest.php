<?php

declare(strict_types=1);

namespace tests\Devboard\GitHub\User;

use Devboard\GitHub\User\GitHubUserId;

/**
 * @covers \Devboard\GitHub\User\GitHubUserId
 * @group  unit
 */
class GitHubUserIdTest extends \PHPUnit_Framework_TestCase
{
    /** @dataProvider provideUserIds */
    public function testItExposesValue(int $id)
    {
        $sut = new GitHubUserId($id);
        $this->assertEquals($id, $sut->getValue());
    }

    /** @dataProvider provideUserIds */
    public function testItCanBeAutoConvertedToString(int $id)
    {
        $sut = new GitHubUserId($id);
        $this->assertEquals((string) $id, (string) $sut);
    }

    public function provideUserIds()
    {
        return [
            [200123],
        ];
    }
}
