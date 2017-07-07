<?php

declare(strict_types=1);

namespace spec\DevboardLib\GitHub\Tag;

use DevboardLib\GitHub\Tag\GitHubTagName;
use PhpSpec\ObjectBehavior;

class GitHubTagNameSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith('0.1.0');
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(GitHubTagName::class);
    }

    public function it_will_expose_value()
    {
        $this->getValue()->shouldReturn('0.1.0');
    }

    public function it_should_be_castable_to_string()
    {
        $this->__toString()->shouldReturn('0.1.0');
    }
}
