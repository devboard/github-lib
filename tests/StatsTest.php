<?php

declare(strict_types=1);

namespace tests\DevboardLib\GitHub;

abstract class StatsTest extends \PHPUnit_Framework_TestCase
{
    abstract public static function createSut(int $value);

    /** @dataProvider provideValues */
    public function testItExposesValue(int $value)
    {
        $sut = static::createSut($value);
        $this->assertEquals($value, $sut->getValue());
    }

    /** @dataProvider provideValues */
    public function testItCanBeAutoConvertedToString(int $value)
    {
        $sut = static::createSut($value);
        $this->assertEquals((string) $value, (string) $sut);
    }

    public function provideValues()
    {
        return [
            [0],
            [1],
        ];
    }
}
