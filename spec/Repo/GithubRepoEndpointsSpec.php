<?php

declare(strict_types=1);

namespace spec\Devboard\Github\Repo;

use Devboard\Github\Repo\GithubRepoApiUrl;
use Devboard\Github\Repo\GithubRepoEndpoints;
use Devboard\Github\Repo\GithubRepoHtmlUrl;
use PhpSpec\ObjectBehavior;

class GithubRepoEndpointsSpec extends ObjectBehavior
{
    public function let(GithubRepoApiUrl $apiUrl, GithubRepoHtmlUrl $htmlUrl)
    {
        $this->beConstructedWith($apiUrl, $htmlUrl);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(GithubRepoEndpoints::class);
    }

    public function it_will_expose_each_endpoint(GithubRepoApiUrl $apiUrl, GithubRepoHtmlUrl $htmlUrl)
    {
        $this->getApiUrl()->shouldReturn($apiUrl);
        $this->getHtmlUrl()->shouldReturn($htmlUrl);
    }
}
