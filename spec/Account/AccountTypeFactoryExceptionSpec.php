<?php

declare(strict_types=1);

namespace spec\DevboardLib\GitHub\Account;

use DevboardLib\GitHub\Account\AccountTypeFactoryException;
use Exception;
use PhpSpec\ObjectBehavior;

class AccountTypeFactoryExceptionSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedThrough('create', ['message']);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(AccountTypeFactoryException::class);
        $this->shouldHaveType(Exception::class);
    }

    public function it_has_custom_message()
    {
        $this->getMessage()->shouldReturn('Unknown AccountType with name: message');
    }
}
