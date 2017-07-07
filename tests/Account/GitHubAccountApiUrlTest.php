<?php

declare(strict_types=1);

namespace tests\DevboardLib\GitHub\Account;

use DevboardLib\GitHub\Account\GitHubAccountApiUrl;

/**
 * @covers \DevboardLib\GitHub\Account\GitHubAccountApiUrl
 * @group  unit
 */
class GitHubAccountApiUrlTest extends \PHPUnit_Framework_TestCase
{
    /** @dataProvider provideAccountIds */
    public function testItExposesValue(string $id)
    {
        $sut = new GitHubAccountApiUrl($id);
        $this->assertEquals($id, $sut->getValue());
    }

    /** @dataProvider provideAccountIds */
    public function testItCanBeAutoConvertedToString(string $id)
    {
        $sut = new GitHubAccountApiUrl($id);
        $this->assertEquals($id, (string) $sut);
    }

    public function provideAccountIds()
    {
        return [
            ['https://api.github.com/users/devboard-test'],
        ];
    }
}
