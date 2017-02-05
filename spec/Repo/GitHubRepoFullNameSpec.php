<?php

declare(strict_types=1);

namespace spec\Devboard\GitHub\Repo;

use Devboard\GitHub\Repo\GitHubRepoFullName;
use Devboard\GitHub\Repo\GitHubRepoName;
use Devboard\GitHub\User\GitHubUserLogin;
use PhpSpec\ObjectBehavior;

class GitHubRepoFullNameSpec extends ObjectBehavior
{
    public function let(GitHubUserLogin $owner, GitHubRepoName $repoName)
    {
        $owner->getValue()->willReturn('devboard-test');
        $repoName->getValue()->willReturn('super-library');

        $this->beConstructedWith($owner, $repoName);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(GitHubRepoFullName::class);
    }

    public function it_can_be_created_from_string()
    {
        $this->createFromString('devboard-test/super-library')->shouldReturnAnInstanceOf(GitHubRepoFullName::class);
    }

    public function it_should_expose_owner_as_object(GitHubUserLogin $owner)
    {
        $this->getOwner()->shouldReturn($owner);
    }

    public function it_should_expose_repository_name_as_object(GitHubRepoName $repoName)
    {
        $this->getRepoName()->shouldReturn($repoName);
    }

    public function it_should_expose_value()
    {
        $this->getValue()->shouldReturn('devboard-test/super-library');
    }

    public function it_should_be_castable_to_string()
    {
        $this->__toString()->shouldReturn('devboard-test/super-library');
    }
}