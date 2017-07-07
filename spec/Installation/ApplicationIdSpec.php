<?php

declare(strict_types=1);

namespace spec\DevboardLib\GitHub\Installation;

use DevboardLib\GitHub\Installation\ApplicationId;
use PhpSpec\ObjectBehavior;

class ApplicationIdSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith(432001);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(ApplicationId::class);
    }

    public function it_should_expose_value()
    {
        $this->getValue()->shouldReturn(432001);
    }

    public function it_should_be_castable_to_string()
    {
        $this->__toString()->shouldReturn('432001');
    }
}
