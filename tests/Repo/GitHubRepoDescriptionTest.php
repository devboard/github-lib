<?php

declare(strict_types=1);

namespace tests\Devboard\GitHub\Repo;

use Devboard\GitHub\Repo\GitHubRepoDescription;

/**
 * @covers \Devboard\GitHub\Repo\GitHubRepoDescription
 * @group  unit
 */
class GitHubRepoDescriptionTest extends \PHPUnit_Framework_TestCase
{
    /** @dataProvider provideRepositoryDescriptions */
    public function testItExposesValue($description)
    {
        $sut = new GitHubRepoDescription($description);
        $this->assertEquals($description, $sut->getValue());
    }

    /** @dataProvider provideRepositoryDescriptions */
    public function testItCanBeAutoConvertedToString($description)
    {
        $sut = new GitHubRepoDescription($description);
        $this->assertEquals($description, (string) $sut);
    }

    public function provideRepositoryDescriptions()
    {
        return [
            ['Short description of this lovely github repository.'],
        ];
    }
}
