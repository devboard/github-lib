<?php

declare(strict_types=1);

namespace spec\Devboard\GitHub\Account;

use Devboard\GitHub\Account\GitHubAccountTypeFactoryException;
use Exception;
use PhpSpec\ObjectBehavior;

class GitHubAccountTypeFactoryExceptionSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedThrough('create', ['message']);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(GitHubAccountTypeFactoryException::class);
        $this->shouldHaveType(Exception::class);
    }

    public function it_has_custom_message()
    {
        $this->getMessage()->shouldReturn('Unknown GitHubAccountType with name: message');
    }
}
