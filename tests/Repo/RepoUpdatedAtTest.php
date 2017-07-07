<?php

declare(strict_types=1);

namespace tests\DevboardLib\GitHub\Repo;

use DateTime;
use DevboardLib\GitHub\Repo\RepoUpdatedAt;

/**
 * @covers \DevboardLib\GitHub\Repo\RepoUpdatedAt
 * @group  unit
 */
class RepoUpdatedAtTest extends \PHPUnit_Framework_TestCase
{
    /** @dataProvider provideDateTimeStrings */
    public function testItCanBeAutoConvertedToString(string $inputDate, string $expectedDateFormat)
    {
        $sut = new RepoUpdatedAt($inputDate);
        $this->assertEquals($expectedDateFormat, (string) $sut);
    }

    /** @dataProvider provideDateTimeStrings */
    public function testItCanBeCreatedFromDateTimeFormat(string $inputDate, string $expectedDateFormat)
    {
        $sut = RepoUpdatedAt::createFromFormat(DateTime::ATOM, $inputDate);
        $this->assertEquals($expectedDateFormat, (string) $sut);
    }

    public function provideDateTimeStrings()
    {
        return [
            ['2012-02-02T11:22:33Z', '2012-02-02T11:22:33+00:00'],
        ];
    }
}
