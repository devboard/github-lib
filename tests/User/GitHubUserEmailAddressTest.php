<?php

declare(strict_types=1);

namespace tests\Devboard\GitHub\User;

use Devboard\GitHub\User\GitHubUserEmailAddress;

/**
 * @covers \Devboard\GitHub\User\GitHubUserEmailAddress
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
