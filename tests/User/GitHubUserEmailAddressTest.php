<?php

declare(strict_types=1);

namespace tests\DevboardLib\GitHub\User;

use DevboardLib\GitHub\User\GitHubUserEmailAddress;

/**
 * @covers \DevboardLib\GitHub\User\GitHubUserEmailAddress
 * @group  unit
 */
class GitHubUserEmailAddressTest extends \PHPUnit_Framework_TestCase
{
    /** @dataProvider provideNames */
    public function testItExposesValue(string $email)
    {
        $sut = new GitHubUserEmailAddress($email);
        $this->assertEquals($email, $sut->getValue());
    }

    /** @dataProvider provideNames */
    public function testItCanBeAutoConvertedToString(string $email)
    {
        $sut = new GitHubUserEmailAddress($email);
        $this->assertEquals($email, (string) $sut);
    }

    public function provideNames()
    {
        return [
            ['nobody@example.com'],
        ];
    }
}
