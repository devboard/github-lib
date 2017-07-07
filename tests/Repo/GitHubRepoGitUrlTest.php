<?php

declare(strict_types=1);

namespace tests\DevboardLib\GitHub\Repo;

use DevboardLib\GitHub\Repo\GitHubRepoGitUrl;

/**
 * @covers \DevboardLib\GitHub\Repo\GitHubRepoGitUrl
 * @group  unit
 */
class GitHubRepoGitUrlTest extends \PHPUnit_Framework_TestCase
{
    /** @dataProvider provideRepositoryGitUrls */
    public function testItExposesValue(string $gitUrl)
    {
        $sut = new GitHubRepoGitUrl($gitUrl);
        $this->assertEquals($gitUrl, $sut->getValue());
    }

    /** @dataProvider provideRepositoryGitUrls */
    public function testItCanBeAutoConvertedToString(string $gitUrl)
    {
        $sut = new GitHubRepoGitUrl($gitUrl);
        $this->assertEquals($gitUrl, (string) $sut);
    }

    public function provideRepositoryGitUrls()
    {
        return [
            ['git://github.com/devboard-test/super-library.git'],
        ];
    }
}
