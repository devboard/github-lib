<?php

declare(strict_types=1);

namespace tests\Devboard\Github\Repo;

use Devboard\Github\Repo\GithubRepoDescription;

/**
 * @covers \Devboard\Github\Repo\GithubRepoDescription
 * @group  unit
 */
class GithubRepoDescriptionTest extends \PHPUnit_Framework_TestCase
{
    /** @dataProvider provideRepositoryDescriptions */
    public function testItExposesValue($description)
    {
        $sut = new GithubRepoDescription($description);
        $this->assertEquals($description, $sut->getValue());
    }

    /** @dataProvider provideRepositoryDescriptions */
    public function testItCanBeAutoConvertedToString($description)
    {
        $sut = new GithubRepoDescription($description);
        $this->assertEquals($description, (string) $sut);
    }

    public function provideRepositoryDescriptions()
    {
        return [
            ['Short description of this lovely github repository.'],
        ];
    }
}
