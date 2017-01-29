<?php

declare(strict_types=1);

namespace tests\Devboard\Github\Repo;

use DateTime;
use Devboard\Github\Repo\GithubRepoUpdatedAt;

/**
 * @covers \Devboard\Github\Repo\GithubRepoUpdatedAt
 * @group  unit
 */
class GithubRepoUpdatedAtTest extends \PHPUnit_Framework_TestCase
{
    /** @dataProvider provideDateTimeStrings */
    public function testItCanBeAutoConvertedToString(string $inputDate, string $expectedDateFormat)
    {
        $sut = new GithubRepoUpdatedAt($inputDate);
        $this->assertEquals($expectedDateFormat, (string) $sut);
    }

    /** @dataProvider provideDateTimeStrings */
    public function testItCanBeCreatedFromGithubDateTimeFormat(string $inputDate, string $expectedDateFormat)
    {
        $sut = GithubRepoUpdatedAt::createFromFormat(DateTime::ATOM, $inputDate);
        $this->assertEquals($expectedDateFormat, (string) $sut);
    }

    public function provideDateTimeStrings()
    {
        return [
            ['2012-02-02T11:22:33Z', '2012-02-02T11:22:33+00:00'],
        ];
    }
}
