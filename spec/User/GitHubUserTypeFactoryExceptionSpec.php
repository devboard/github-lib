<?php

declare(strict_types=1);

namespace spec\Devboard\GitHub\User;

use Devboard\GitHub\User\GitHubUserTypeFactoryException;
use Exception;
use PhpSpec\ObjectBehavior;

class GitHubUserTypeFactoryExceptionSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedThrough('create', ['message']);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(GitHubUserTypeFactoryException::class);
        $this->shouldHaveType(Exception::class);
    }

    public function it_has_custom_message()
    {
        $this->getMessage()->shouldReturn('Unknown GitHubUserType with name: message');
    }
}
