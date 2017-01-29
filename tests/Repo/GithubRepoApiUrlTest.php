<?php

declare(strict_types=1);

namespace tests\Devboard\Github\Repo;

use Devboard\Github\Repo\GithubRepoApiUrl;

/**
 * @covers \Devboard\Github\Repo\GithubRepoApiUrl
 * @group  unit
 */
class GithubRepoApiUrlTest extends \PHPUnit_Framework_TestCase
{
    /** @dataProvider provideRepositoryApiUrls */
    public function testItExposesValue(string $apiUrl)
    {
        $sut = new GithubRepoApiUrl($apiUrl);
        $this->assertEquals($apiUrl, $sut->getValue());
    }

    /** @dataProvider provideRepositoryApiUrls */
    public function testItCanBeAutoConvertedToString(string $apiUrl)
    {
        $sut = new GithubRepoApiUrl($apiUrl);
        $this->assertEquals($apiUrl, (string) $sut);
    }

    public function provideRepositoryApiUrls()
    {
        return [
            ['https://api.github.com/repos/devboard-test/super-library'],
        ];
    }
}
