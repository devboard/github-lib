<?php

declare(strict_types=1);

namespace tests\Devboard\Github\Commit\Committer;

use Devboard\Github\Commit\Committer\GithubCommitCommitterEmail;

/**
 * @covers \Devboard\Github\Commit\Committer\GithubCommitCommitterEmail
 * @group  unit
 */
class GithubCommitCommitterEmailTest extends \PHPUnit_Framework_TestCase
{
    /** @dataProvider provideNames */
    public function testItExposesValue(string $email)
    {
        $sut = new GithubCommitCommitterEmail($email);
        $this->assertEquals($email, $sut->getValue());
    }

    /** @dataProvider provideNames */
    public function testItCanBeAutoConvertedToString(string $email)
    {
        $sut = new GithubCommitCommitterEmail($email);
        $this->assertEquals($email, (string) $sut);
    }

    public function provideNames()
    {
        return [
            ['nobody@example.com'],
        ];
    }
}
