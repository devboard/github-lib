<?php

declare(strict_types=1);

namespace spec\DevboardLib\GitHub\Repo;

use DevboardLib\GitHub\Account\AccountLogin;
use DevboardLib\GitHub\Repo\RepoFullName;
use DevboardLib\GitHub\Repo\RepoName;
use PhpSpec\ObjectBehavior;

class RepoFullNameSpec extends ObjectBehavior
{
    public function let(AccountLogin $owner, RepoName $repoName)
    {
        $owner->getValue()->willReturn('devboard-test');
        $repoName->getValue()->willReturn('super-library');

        $this->beConstructedWith($owner, $repoName);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(RepoFullName::class);
    }

    public function it_can_be_created_from_string()
    {
        $this->createFromString('devboard-test/super-library')->shouldReturnAnInstanceOf(RepoFullName::class);
    }

    public function it_should_expose_owner_as_object(AccountLogin $owner)
    {
        $this->getOwner()->shouldReturn($owner);
    }

    public function it_should_expose_repository_name_as_object(RepoName $repoName)
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
