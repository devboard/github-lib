<?php

declare(strict_types=1);

namespace tests\DevboardLib\GitHub\Application;

use DevboardLib\GitHub\Application\ApplicationId;

/**
 * @covers \DevboardLib\GitHub\Application\ApplicationId
 * @group  unit
 */
class ApplicationIdTest extends \PHPUnit_Framework_TestCase
{
    /** @dataProvider provideApplicationIds */
    public function testItExposesValue(int $id)
    {
        $sut = new ApplicationId($id);
        $this->assertEquals($id, $sut->getValue());
    }

    /** @dataProvider provideApplicationIds */
    public function testItCanBeAutoConvertedToString(int $id)
    {
        $sut = new ApplicationId($id);
        $this->assertEquals((string) $id, (string) $sut);
    }

    public function provideApplicationIds()
    {
        return [
            [123],
        ];
    }
}
