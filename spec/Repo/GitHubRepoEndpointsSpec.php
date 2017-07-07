<?php

declare(strict_types=1);

namespace spec\DevboardLib\GitHub\Repo;

use DevboardLib\GitHub\Repo\GitHubRepoApiUrl;
use DevboardLib\GitHub\Repo\GitHubRepoEndpoints;
use DevboardLib\GitHub\Repo\GitHubRepoHtmlUrl;
use PhpSpec\ObjectBehavior;

class GitHubRepoEndpointsSpec extends ObjectBehavior
{
    public function let(GitHubRepoApiUrl $apiUrl, GitHubRepoHtmlUrl $htmlUrl)
    {
        $this->beConstructedWith($apiUrl, $htmlUrl);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(GitHubRepoEndpoints::class);
    }

    public function it_will_expose_each_endpoint(GitHubRepoApiUrl $apiUrl, GitHubRepoHtmlUrl $htmlUrl)
    {
        $this->getApiUrl()->shouldReturn($apiUrl);
        $this->getHtmlUrl()->shouldReturn($htmlUrl);
    }
}
