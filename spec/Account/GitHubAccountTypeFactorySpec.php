<?php

declare(strict_types=1);

namespace spec\DevboardLib\GitHub\Account;

use DevboardLib\GitHub\Account\GitHubAccountTypeFactory;
use DevboardLib\GitHub\Account\GitHubAccountTypeFactoryException;
use DevboardLib\GitHub\Account\Type\Organization;
use DevboardLib\GitHub\Account\Type\User;
use PhpSpec\ObjectBehavior;

class GitHubAccountTypeFactorySpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith();
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(GitHubAccountTypeFactory::class);
    }

    public function it_will_return_organization()
    {
        $this->create(Organization::NAME)->shouldReturnAnInstanceOf(Organization::class);
    }

    public function it_will_return_user()
    {
        $this->create(User::NAME)->shouldReturnAnInstanceOf(User::class);
    }

    public function it_will_throw_exception_on_unknown_string()
    {
        $this->shouldThrow(GitHubAccountTypeFactoryException::class)->duringCreate('SomeRandomName');
    }
}
