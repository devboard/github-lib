<?php

declare(strict_types=1);

namespace tests\DevboardLib\GitHub\Tag;

use DevboardLib\GitHub\Tag\TagName;

/**
 * @covers \DevboardLib\GitHub\Tag\TagName
 * @group  unit
 */
class TagNameTest extends \PHPUnit_Framework_TestCase
{
    /** @dataProvider provideTagNames */
    public function testItExposesValue($name)
    {
        $sut = new TagName($name);
        $this->assertEquals($name, $sut->getValue());
    }

    /** @dataProvider provideTagNames */
    public function testItCanBeAutoConvertedToString($name)
    {
        $sut = new TagName($name);
        $this->assertEquals($name, (string) $sut);
    }

    public function provideTagNames()
    {
        return [
            ['0.1.0'],
            ['1.0'],
        ];
    }
}
