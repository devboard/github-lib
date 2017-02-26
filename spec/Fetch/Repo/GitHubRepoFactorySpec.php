<?php

declare(strict_types=1);

namespace spec\Devboard\GitHub\Fetch\Repo;

use Devboard\GitHub\Fetch\Repo\GitHubRepoFactory;
use Devboard\GitHub\GitHubRepo;
use PhpSpec\ObjectBehavior;
use tests\Devboard\GitHub\Fetch\TestData\TestDataProvider;

class GitHubRepoFactorySpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith();
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(GitHubRepoFactory::class);
    }

    public function it_will_return_github_repo_instance()
    {
        $provider = new TestDataProvider();

        $data = $provider->getRandomGitHubRepoData();

        $this->create($data)->shouldReturnAnInstanceOf(GitHubRepo::class);
    }
}
