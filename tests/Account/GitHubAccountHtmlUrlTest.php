<?php

declare(strict_types=1);

namespace tests\Devboard\GitHub\Account;

use Devboard\GitHub\Account\GitHubAccountHtmlUrl;

/**
 * @covers \Devboard\GitHub\Account\GitHubAccountHtmlUrl
 * @group  unit
 */
class GitHubAccountHtmlUrlTest extends \PHPUnit_Framework_TestCase
{
    /** @dataProvider provideAccountIds */
    public function testItExposesValue(string $id)
    {
        $sut = new GitHubAccountHtmlUrl($id);
        $this->assertEquals($id, $sut->getValue());
    }

    /** @dataProvider provideAccountIds */
    public function testItCanBeAutoConvertedToString(string $id)
    {
        $sut = new GitHubAccountHtmlUrl($id);
        $this->assertEquals($id, (string) $sut);
    }

    public function provideAccountIds()
    {
        return [
            ['https://github.com/devboard-test'],
        ];
    }
}
