<?php

declare(strict_types=1);

namespace tests\Devboard\Github\Repo;

use Devboard\Github\Repo\GithubRepoGitUrl;

/**
 * @covers \Devboard\Github\Repo\GithubRepoGitUrl
 * @group  unit
 */
class GithubRepoGitUrlTest extends \PHPUnit_Framework_TestCase
{
    /** @dataProvider provideRepositoryGitUrls */
    public function testItExposesValue(string $gitUrl)
    {
        $sut = new GithubRepoGitUrl($gitUrl);
        $this->assertEquals($gitUrl, $sut->getValue());
    }

    /** @dataProvider provideRepositoryGitUrls */
    public function testItCanBeAutoConvertedToString(string $gitUrl)
    {
        $sut = new GithubRepoGitUrl($gitUrl);
        $this->assertEquals($gitUrl, (string) $sut);
    }

    public function provideRepositoryGitUrls()
    {
        return [
            ['git://github.com/devboard-test/super-library.git'],
        ];
    }
}
