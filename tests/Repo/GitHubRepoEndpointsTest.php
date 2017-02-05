<?php

declare(strict_types=1);

namespace tests\Devboard\GitHub\Repo;

use Devboard\GitHub\Repo\GitHubRepoApiUrl;
use Devboard\GitHub\Repo\GitHubRepoEndpoints;
use Devboard\GitHub\Repo\GitHubRepoHtmlUrl;

/**
 * @covers \Devboard\GitHub\Repo\GitHubRepoEndpoints
 * @group  unit
 */
class GitHubRepoEndpointsTest extends \PHPUnit_Framework_TestCase
{
    /** @dataProvider provideEndpoints */
    public function testGetters(GitHubRepoApiUrl $apiUrl, GitHubRepoHtmlUrl $htmlUrl)
    {
        $sut = new GitHubRepoEndpoints($apiUrl, $htmlUrl);

        $this->assertEquals($apiUrl, $sut->getApiUrl());
        $this->assertEquals($htmlUrl, $sut->getHtmlUrl());
    }

    public function provideEndpoints()
    {
        return [
            [
                new GitHubRepoApiUrl('..'),
                new GitHubRepoHtmlUrl('..'),
            ],
        ];
    }
}
