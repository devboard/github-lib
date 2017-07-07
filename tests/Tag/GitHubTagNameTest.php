<?php

declare(strict_types=1);

namespace tests\DevboardLib\GitHub\Tag;

use DevboardLib\GitHub\Tag\GitHubTagName;

/**
 * @covers \DevboardLib\GitHub\Tag\GitHubTagName
 * @group  unit
 */
class GitHubTagNameTest extends \PHPUnit_Framework_TestCase
{
    /** @dataProvider provideTagNames */
    public function testItExposesValue($name)
    {
        $sut = new GitHubTagName($name);
        $this->assertEquals($name, $sut->getValue());
    }

    /** @dataProvider provideTagNames */
    public function testItCanBeAutoConvertedToString($name)
    {
        $sut = new GitHubTagName($name);
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
