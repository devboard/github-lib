<?php

declare(strict_types=1);

namespace tests\DevboardLib\GitHub\Repo;

use DevboardLib\GitHub\Repo\GitHubRepoAccessPermissions;

/**
 * @covers \DevboardLib\GitHub\Repo\GitHubRepoAccessPermissions
 * @group  unit
 */
class GitHubRepoAccessPermissionsTest extends \PHPUnit_Framework_TestCase
{
    /** @dataProvider provideValues */
    public function testIt(bool $admin, bool $pushAllowed, bool $pullAllowed)
    {
        $sut = new GitHubRepoAccessPermissions($admin, $pushAllowed, $pullAllowed);

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
