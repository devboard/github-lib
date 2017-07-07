<?php

declare(strict_types=1);

namespace tests\DevboardLib\GitHub\Repo;

use DevboardLib\GitHub\Repo\RepoHtmlUrl;

/**
 * @covers \DevboardLib\GitHub\Repo\RepoHtmlUrl
 * @group  unit
 */
class RepoHtmlUrlTest extends \PHPUnit_Framework_TestCase
{
    /** @dataProvider provideRepositoryHtmlUrls */
    public function testItExposesValue(string $htmlUrl)
    {
        $sut = new RepoHtmlUrl($htmlUrl);
        $this->assertEquals($htmlUrl, $sut->getValue());
    }

    /** @dataProvider provideRepositoryHtmlUrls */
    public function testItCanBeAutoConvertedToString(string $htmlUrl)
    {
        $sut = new RepoHtmlUrl($htmlUrl);
        $this->assertEquals($htmlUrl, (string) $sut);
    }

    public function provideRepositoryHtmlUrls()
    {
        return [
            ['https://github.com/devboard-test/super-library'],
            ['https://www.github.com/devboard-test/super-library'],
        ];
    }
}
