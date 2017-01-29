<?php

declare(strict_types=1);

namespace spec\Devboard\Github\User;

use Devboard\Github\User\GithubUserTypeFactoryException;
use Exception;
use PhpSpec\ObjectBehavior;

class GithubUserTypeFactoryExceptionSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedThrough('create', ['message']);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(GithubUserTypeFactoryException::class);
        $this->shouldHaveType(Exception::class);
    }

    public function it_has_custom_message()
    {
        $this->getMessage()->shouldReturn('Unknown GithubUserType with name: message');
    }
}
