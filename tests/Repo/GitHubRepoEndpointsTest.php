<?php

declare(strict_types=1);

namespace tests\DevboardLib\GitHub\Repo;

use DevboardLib\GitHub\Repo\GitHubRepoApiUrl;
use DevboardLib\GitHub\Repo\GitHubRepoEndpoints;
use DevboardLib\GitHub\Repo\GitHubRepoHtmlUrl;

/**
 * @covers \DevboardLib\GitHub\Repo\GitHubRepoEndpoints
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

    /** @dataProvider provideEndpoints */
    public function testSerializationAndDeserialization(GitHubRepoApiUrl $apiUrl, GitHubRepoHtmlUrl $htmlUrl)
    {
        $sut = new GitHubRepoEndpoints($apiUrl, $htmlUrl);

        $serialized = $sut->serialize();

        $this->assertEquals($sut, GitHubRepoEndpoints::deserialize($serialized));
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
