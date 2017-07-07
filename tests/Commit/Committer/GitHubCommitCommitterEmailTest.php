<?php

declare(strict_types=1);

namespace tests\DevboardLib\GitHub\Commit\Committer;

use DevboardLib\GitHub\Commit\Committer\GitHubCommitCommitterEmail;

/**
 * @covers \DevboardLib\GitHub\Commit\Committer\GitHubCommitCommitterEmail
 * @group  unit
 */
class GitHubCommitCommitterEmailTest extends \PHPUnit_Framework_TestCase
{
    /** @dataProvider provideNames */
    public function testItExposesValue(string $email)
    {
        $sut = new GitHubCommitCommitterEmail($email);
        $this->assertEquals($email, $sut->getValue());
    }

    /** @dataProvider provideNames */
    public function testItCanBeAutoConvertedToString(string $email)
    {
        $sut = new GitHubCommitCommitterEmail($email);
        $this->assertEquals($email, (string) $sut);
    }

    public function provideNames()
    {
        return [
            ['nobody@example.com'],
        ];
    }
}
