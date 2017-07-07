<?php

declare(strict_types=1);

namespace tests\DevboardLib\GitHub\Repo;

use DevboardLib\GitHub\Repo\GitHubRepoApiUrl;

/**
 * @covers \DevboardLib\GitHub\Repo\GitHubRepoApiUrl
 * @group  unit
 */
class GitHubRepoApiUrlTest extends \PHPUnit_Framework_TestCase
{
    /** @dataProvider provideRepositoryApiUrls */
    public function testItExposesValue(string $apiUrl)
    {
        $sut = new GitHubRepoApiUrl($apiUrl);
        $this->assertEquals($apiUrl, $sut->getValue());
    }

    /** @dataProvider provideRepositoryApiUrls */
    public function testItCanBeAutoConvertedToString(string $apiUrl)
    {
        $sut = new GitHubRepoApiUrl($apiUrl);
        $this->assertEquals($apiUrl, (string) $sut);
    }

    public function provideRepositoryApiUrls()
    {
        return [
            ['https://api.github.com/repos/devboard-test/super-library'],
        ];
    }
}
