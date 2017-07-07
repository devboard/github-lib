<?php

declare(strict_types=1);

namespace tests\DevboardLib\GitHub\Repo;

use DateTime;
use DevboardLib\GitHub\Repo\RepoPushedAt;

/**
 * @covers \DevboardLib\GitHub\Repo\RepoPushedAt
 * @group  unit
 */
class RepoPushedAtTest extends \PHPUnit_Framework_TestCase
{
    /** @dataProvider provideDateTimeStrings */
    public function testItCanBeAutoConvertedToString(string $inputDate, string $expectedDateFormat)
    {
        $sut = new RepoPushedAt($inputDate);
        $this->assertEquals($expectedDateFormat, (string) $sut);
    }

    /** @dataProvider provideDateTimeStrings */
    public function testItCanBeCreatedFromDateTimeFormat(string $inputDate, string $expectedDateFormat)
    {
        $sut = RepoPushedAt::createFromFormat(DateTime::ATOM, $inputDate);
        $this->assertEquals($expectedDateFormat, (string) $sut);
    }

    public function provideDateTimeStrings()
    {
        return [
            ['2012-02-02T11:22:33Z', '2012-02-02T11:22:33+00:00'],
        ];
    }
}
