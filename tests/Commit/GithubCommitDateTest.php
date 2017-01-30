<?php

declare(strict_types=1);

namespace tests\Devboard\Github\Commit;

use DateTime;
use Devboard\Github\Commit\GithubCommitDate;

/**
 * @covers \Devboard\Github\Commit\GithubCommitDate
 * @group  unit
 */
class GithubCommitDateTest extends \PHPUnit_Framework_TestCase
{
    /** @dataProvider provideDateTimeStrings */
    public function testItCanBeAutoConvertedToString(string $inputDate, string $expectedDateFormat)
    {
        $sut = new GithubCommitDate($inputDate);
        $this->assertEquals($expectedDateFormat, (string) $sut);
    }

    /** @dataProvider provideDateTimeStrings */
    public function testItCanBeCreatedFromGithubDateTimeFormat(string $inputDate, string $expectedDateFormat)
    {
        $sut = GithubCommitDate::createFromFormat(DateTime::ATOM, $inputDate);
        $this->assertEquals($expectedDateFormat, (string) $sut);
    }

    public function provideDateTimeStrings()
    {
        return [
            ['2012-02-02T11:22:33Z', '2012-02-02T11:22:33+00:00'],
        ];
    }
}
