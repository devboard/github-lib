<?php

declare(strict_types=1);

namespace tests\DevboardLib\GitHub\Commit;

use DevboardLib\GitHub\Commit\CommitMessage;

/**
 * @covers \DevboardLib\GitHub\Commit\CommitMessage
 * @group  unit
 */
class CommitMessageTest extends \PHPUnit_Framework_TestCase
{
    /** @dataProvider provideCommitMessages */
    public function testItExposesValue(string $message)
    {
        $sut = new CommitMessage($message);
        $this->assertEquals($message, $sut->getValue());
    }

    /** @dataProvider provideCommitMessages */
    public function testItCanBeAutoConvertedToString(string $message)
    {
        $sut = new CommitMessage($message);
        $this->assertEquals($message, (string) $sut);
    }

    public function provideCommitMessages()
    {
        return [
            ['Commit message'],
        ];
    }
}
