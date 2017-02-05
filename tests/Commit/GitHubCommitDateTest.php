<?php

declare(strict_types=1);

namespace tests\Devboard\GitHub\Commit;

use DateTime;
use Devboard\GitHub\Commit\GitHubCommitDate;

/**
 * @covers \Devboard\GitHub\Commit\GitHubCommitDate
 * @group  unit
 */
class GitHubCommitDateTest extends \PHPUnit_Framework_TestCase
{
    /** @dataProvider provideDateTimeStrings */
    public function testItCanBeAutoConvertedToString(string $inputDate, string $expectedDateFormat)
    {
        $sut = new GitHubCommitDate($inputDate);
        $this->assertEquals($expectedDateFormat, (string) $sut);
    }

    /** @dataProvider provideDateTimeStrings */
    public function testItCanBeCreatedFromGitHubDateTimeFormat(string $inputDate, string $expectedDateFormat)
    {
        $sut = GitHubCommitDate::createFromFormat(DateTime::ATOM, $inputDate);
        $this->assertEquals($expectedDateFormat, (string) $sut);
    }

    public function provideDateTimeStrings()
    {
        return [
            ['2012-02-02T11:22:33Z', '2012-02-02T11:22:33+00:00'],
        ];
    }
}
