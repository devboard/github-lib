<?php

declare(strict_types=1);

namespace spec\Devboard\Github\Fetch\Repo;

use Devboard\Github\Fetch\Repo\GithubRepo;
use Devboard\Github\Fetch\Repo\GithubRepoFactory;
use PhpSpec\ObjectBehavior;
use tests\Devboard\Github\Fetch\TestData\TestDataProvider;

class GithubRepoFactorySpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith();
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(GithubRepoFactory::class);
    }

    public function it_will_return_github_repo_instance()
    {
        $provider = new TestDataProvider();

        $data = $provider->getRandomGitHubRepoData();

        $this->create($data)->shouldReturnAnInstanceOf(GithubRepo::class);
    }
}
