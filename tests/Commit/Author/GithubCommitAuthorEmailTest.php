<?php

declare(strict_types=1);

namespace tests\Devboard\Github\Commit\Author;

use Devboard\Github\Commit\Author\GithubCommitAuthorEmail;

/**
 * @covers \Devboard\Github\Commit\Author\GithubCommitAuthorEmail
 * @group  unit
 */
class GithubCommitAuthorEmailTest extends \PHPUnit_Framework_TestCase
{
    /** @dataProvider provideNames */
    public function testItExposesValue(string $email)
    {
        $sut = new GithubCommitAuthorEmail($email);
        $this->assertEquals($email, $sut->getValue());
    }

    /** @dataProvider provideNames */
    public function testItCanBeAutoConvertedToString(string $email)
    {
        $sut = new GithubCommitAuthorEmail($email);
        $this->assertEquals($email, (string) $sut);
    }

    public function provideNames()
    {
        return [
            ['nobody@example.com'],
        ];
    }
}
