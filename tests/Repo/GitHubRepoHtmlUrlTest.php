<?php

declare(strict_types=1);

namespace tests\Devboard\GitHub\Repo;

use Devboard\GitHub\Repo\GitHubRepoHtmlUrl;

/**
 * @covers \Devboard\GitHub\Repo\GitHubRepoHtmlUrl
 * @group  unit
 */
class GitHubRepoHtmlUrlTest extends \PHPUnit_Framework_TestCase
{
    /** @dataProvider provideRepositoryHtmlUrls */
    public function testItExposesValue(string $htmlUrl)
    {
        $sut = new GitHubRepoHtmlUrl($htmlUrl);
        $this->assertEquals($htmlUrl, $sut->getValue());
    }

    /** @dataProvider provideRepositoryHtmlUrls */
    public function testItCanBeAutoConvertedToString(string $htmlUrl)
    {
        $sut = new GitHubRepoHtmlUrl($htmlUrl);
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
