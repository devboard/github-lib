<?php

declare(strict_types=1);

namespace tests\Devboard\Github\Repo;

use Devboard\Github\Repo\GithubRepoApiUrl;
use Devboard\Github\Repo\GithubRepoEndpoints;
use Devboard\Github\Repo\GithubRepoHtmlUrl;

/**
 * @covers \Devboard\Github\Repo\GithubRepoEndpoints
 * @group  unit
 */
class GithubRepoEndpointsTest extends \PHPUnit_Framework_TestCase
{
    /** @dataProvider provideEndpoints */
    public function testGetters(GithubRepoApiUrl $apiUrl, GithubRepoHtmlUrl $htmlUrl)
    {
        $sut = new GithubRepoEndpoints($apiUrl, $htmlUrl);

        $this->assertEquals($apiUrl, $sut->getApiUrl());
        $this->assertEquals($htmlUrl, $sut->getHtmlUrl());
    }

    public function provideEndpoints()
    {
        return [
            [
                new GithubRepoApiUrl('..'),
                new GithubRepoHtmlUrl('..'),
            ],
        ];
    }
}
