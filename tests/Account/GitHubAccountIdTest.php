<?php

declare(strict_types=1);

namespace tests\Devboard\GitHub\Account;

use Devboard\GitHub\Account\GitHubAccountId;

/**
 * @covers \Devboard\GitHub\Account\GitHubAccountId
 * @group  unit
 */
class GitHubAccountIdTest extends \PHPUnit_Framework_TestCase
{
    /** @dataProvider provideAccountIds */
    public function testItExposesValue(int $id)
    {
        $sut = new GitHubAccountId($id);
        $this->assertEquals($id, $sut->getValue());
    }

    /** @dataProvider provideAccountIds */
    public function testItCanBeAutoConvertedToString(int $id)
    {
        $sut = new GitHubAccountId($id);
        $this->assertEquals((string) $id, (string) $sut);
    }

    public function provideAccountIds()
    {
        return [
            [200123],
        ];
    }
}
