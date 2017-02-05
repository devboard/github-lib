<?php

declare(strict_types=1);

namespace spec\Devboard\GitHub\User;

use Devboard\GitHub\User\GitHubUserTypeFactory;
use Devboard\GitHub\User\GitHubUserTypeFactoryException;
use Devboard\GitHub\User\Type\Organization;
use Devboard\GitHub\User\Type\User;
use PhpSpec\ObjectBehavior;

class GitHubUserTypeFactorySpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith();
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(GitHubUserTypeFactory::class);
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
        $this->shouldThrow(GitHubUserTypeFactoryException::class)->duringCreate('SomeRandomName');
    }
}
