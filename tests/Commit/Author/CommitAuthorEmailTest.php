<?php

declare(strict_types=1);

namespace tests\DevboardLib\GitHub\Commit\Author;

use DevboardLib\GitHub\Commit\Author\CommitAuthorEmail;

/**
 * @covers \DevboardLib\GitHub\Commit\Author\CommitAuthorEmail
 * @group  unit
 */
class CommitAuthorEmailTest extends \PHPUnit_Framework_TestCase
{
    /** @dataProvider provideNames */
    public function testItExposesValue(string $email)
    {
        $sut = new CommitAuthorEmail($email);
        $this->assertEquals($email, $sut->getValue());
    }

    /** @dataProvider provideNames */
    public function testItCanBeAutoConvertedToString(string $email)
    {
        $sut = new CommitAuthorEmail($email);
        $this->assertEquals($email, (string) $sut);
    }

    public function provideNames()
    {
        return [
            ['nobody@example.com'],
        ];
    }
}
