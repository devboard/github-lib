<?php

declare(strict_types=1);

namespace tests\Devboard\Github\Repo;

use Devboard\Github\Repo\GithubRepoHtmlUrl;

/**
 * @covers \Devboard\Github\Repo\GithubRepoHtmlUrl
 * @group  unit
 */
class GithubRepoHtmlUrlTest extends \PHPUnit_Framework_TestCase
{
    /** @dataProvider provideRepositoryHtmlUrls */
    public function testItExposesValue(string $htmlUrl)
    {
        $sut = new GithubRepoHtmlUrl($htmlUrl);
        $this->assertEquals($htmlUrl, $sut->getValue());
    }

    /** @dataProvider provideRepositoryHtmlUrls */
    public function testItCanBeAutoConvertedToString(string $htmlUrl)
    {
        $sut = new GithubRepoHtmlUrl($htmlUrl);
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
