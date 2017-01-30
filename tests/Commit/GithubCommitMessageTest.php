<?php

declare(strict_types=1);

namespace tests\Devboard\Github\Commit;

use Devboard\Github\Commit\GithubCommitMessage;

/**
 * @covers \Devboard\Github\Commit\GithubCommitMessage
 * @group  unit
 */
class GithubCommitMessageTest extends \PHPUnit_Framework_TestCase
{
    /** @dataProvider provideCommitMessages */
    public function testItExposesValue(string $message)
    {
        $sut = new GithubCommitMessage($message);
        $this->assertEquals($message, $sut->getValue());
    }

    /** @dataProvider provideCommitMessages */
    public function testItCanBeAutoConvertedToString(string $message)
    {
        $sut = new GithubCommitMessage($message);
        $this->assertEquals($message, (string) $sut);
    }

    public function provideCommitMessages()
    {
        return [
            ['Commit message'],
        ];
    }
}
