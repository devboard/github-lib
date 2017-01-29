<?php

declare(strict_types=1);

namespace spec\Devboard\Github\User;

use Devboard\Github\User\GithubUserTypeFactory;
use Devboard\Github\User\GithubUserTypeFactoryException;
use Devboard\Github\User\Type\Organization;
use Devboard\Github\User\Type\User;
use PhpSpec\ObjectBehavior;

class GithubUserTypeFactorySpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith();
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(GithubUserTypeFactory::class);
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
        $this->shouldThrow(GithubUserTypeFactoryException::class)->duringCreate('SomeRandomName');
    }
}
