<?php

declare(strict_types=1);

namespace tests\DevboardLib\GitHub\Repo;

use DevboardLib\GitHub\Repo\RepoApiUrl;
use DevboardLib\GitHub\Repo\RepoEndpoints;
use DevboardLib\GitHub\Repo\RepoHtmlUrl;

/**
 * @covers \DevboardLib\GitHub\Repo\RepoEndpoints
 * @group  unit
 */
class RepoEndpointsTest extends \PHPUnit_Framework_TestCase
{
    /** @dataProvider provideEndpoints */
    public function testGetters(RepoApiUrl $apiUrl, RepoHtmlUrl $htmlUrl)
    {
        $sut = new RepoEndpoints($apiUrl, $htmlUrl);

        $this->assertEquals($apiUrl, $sut->getApiUrl());
        $this->assertEquals($htmlUrl, $sut->getHtmlUrl());
    }

    /** @dataProvider provideEndpoints */
    public function testSerializationAndDeserialization(RepoApiUrl $apiUrl, RepoHtmlUrl $htmlUrl)
    {
        $sut = new RepoEndpoints($apiUrl, $htmlUrl);

        $serialized = $sut->serialize();

        $this->assertEquals($sut, RepoEndpoints::deserialize($serialized));
    }

    public function provideEndpoints()
    {
        return [
            [
                new RepoApiUrl('..'),
                new RepoHtmlUrl('..'),
            ],
        ];
    }
}
