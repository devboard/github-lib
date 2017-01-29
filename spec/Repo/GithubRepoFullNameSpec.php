<?php

declare(strict_types=1);

namespace spec\Devboard\Github\Repo;

use Devboard\Github\Repo\GithubRepoFullName;
use Devboard\Github\Repo\GithubRepoName;
use Devboard\Github\User\GithubUserLogin;
use PhpSpec\ObjectBehavior;

class GithubRepoFullNameSpec extends ObjectBehavior
{
    public function let(GithubUserLogin $owner, GithubRepoName $repoName)
    {
        $owner->getValue()->willReturn('devboard-test');
        $repoName->getValue()->willReturn('super-library');

        $this->beConstructedWith($owner, $repoName);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(GithubRepoFullName::class);
    }

    public function it_can_be_created_from_string()
    {
        $this->createFromString('devboard-test/super-library')->shouldReturnAnInstanceOf(GithubRepoFullName::class);
    }

    public function it_should_expose_owner_as_object(GithubUserLogin $owner)
    {
        $this->getOwner()->shouldReturn($owner);
    }

    public function it_should_expose_repository_name_as_object(GithubRepoName $repoName)
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
