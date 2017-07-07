<?php

declare(strict_types=1);

namespace spec\DevboardLib\GitHub\Repo;

use DevboardLib\GitHub\Repo\RepoApiUrl;
use DevboardLib\GitHub\Repo\RepoEndpoints;
use DevboardLib\GitHub\Repo\RepoHtmlUrl;
use PhpSpec\ObjectBehavior;

class RepoEndpointsSpec extends ObjectBehavior
{
    public function let(RepoApiUrl $apiUrl, RepoHtmlUrl $htmlUrl)
    {
        $this->beConstructedWith($apiUrl, $htmlUrl);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(RepoEndpoints::class);
    }

    public function it_will_expose_each_endpoint(RepoApiUrl $apiUrl, RepoHtmlUrl $htmlUrl)
    {
        $this->getApiUrl()->shouldReturn($apiUrl);
        $this->getHtmlUrl()->shouldReturn($htmlUrl);
    }
}
