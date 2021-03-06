<?php

declare(strict_types=1);

namespace spec\DevboardLib\GitHub\Account;

use DevboardLib\GitHub\Account\AccountId;
use PhpSpec\ObjectBehavior;

class AccountIdSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith(200123);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(AccountId::class);
    }

    public function it_should_expose_value()
    {
        $this->getValue()->shouldReturn(200123);
    }

    public function it_should_be_castable_to_string()
    {
        $this->__toString()->shouldReturn('200123');
    }
}
