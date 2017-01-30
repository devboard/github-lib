<?php

declare(strict_types=1);

namespace tests\Devboard\Github\Repo;

use Devboard\Github\Repo\GithubRepoAccessPermissions;

/**
 * @covers \Devboard\Github\Repo\GithubRepoAccessPermissions
 * @group  unit
 */
class GithubRepoAccessPermissionsTest extends \PHPUnit_Framework_TestCase
{
    /** @dataProvider provideValues */
    public function testIt(bool $admin, bool $pushAllowed, bool $pullAllowed)
    {
        $sut = new GithubRepoAccessPermissions($admin, $pushAllowed, $pullAllowed);

        $this->assertSame($admin, $sut->isAdmin());
        $this->assertSame($pushAllowed, $sut->isPushAllowed());
        $this->assertSame($pullAllowed, $sut->isPullAllowed());
    }

    public function provideValues(): array
    {
        return [
            [true, true, true],
            [false, false, false],
            [true, false, false],
            [false, true, false],
            [false, false, true],
        ];
    }
}
