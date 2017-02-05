<?php

declare(strict_types=1);

namespace tests\Devboard\GitHub\Commit\Author;

use Devboard\GitHub\Commit\Author\GitHubCommitAuthorEmail;

/**
 * @covers \Devboard\GitHub\Commit\Author\GitHubCommitAuthorEmail
 * @group  unit
 */
class GitHubCommitAuthorEmailTest extends \PHPUnit_Framework_TestCase
{
    /** @dataProvider provideNames */
    public function testItExposesValue(string $email)
    {
        $sut = new GitHubCommitAuthorEmail($email);
        $this->assertEquals($email, $sut->getValue());
    }

    /** @dataProvider provideNames */
    public function testItCanBeAutoConvertedToString(string $email)
    {
        $sut = new GitHubCommitAuthorEmail($email);
        $this->assertEquals($email, (string) $sut);
    }

    public function provideNames()
    {
        return [
            ['nobody@example.com'],
        ];
    }
}
