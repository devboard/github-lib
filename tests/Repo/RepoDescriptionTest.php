<?php

declare(strict_types=1);

namespace tests\DevboardLib\GitHub\Repo;

use DevboardLib\GitHub\Repo\RepoDescription;

/**
 * @covers \DevboardLib\GitHub\Repo\RepoDescription
 * @group  unit
 */
class RepoDescriptionTest extends \PHPUnit_Framework_TestCase
{
    /** @dataProvider provideRepositoryDescriptions */
    public function testItExposesValue($description)
    {
        $sut = new RepoDescription($description);
        $this->assertEquals($description, $sut->getValue());
    }

    /** @dataProvider provideRepositoryDescriptions */
    public function testItCanBeAutoConvertedToString($description)
    {
        $sut = new RepoDescription($description);
        $this->assertEquals($description, (string) $sut);
    }

    public function provideRepositoryDescriptions()
    {
        return [
            ['Short description of this lovely github repository.'],
        ];
    }
}
