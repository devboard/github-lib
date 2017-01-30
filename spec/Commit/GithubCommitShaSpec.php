<?php

declare(strict_types=1);

namespace spec\Devboard\Github\Commit;

use Devboard\Github\Commit\GithubCommitSha;
use PhpSpec\ObjectBehavior;

class GithubCommitShaSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith('db911bd3a3dd8bb2ad9eccbcb0a396595a51491d');
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(GithubCommitSha::class);
    }

    public function it_should_expose_value()
    {
        $this->getValue()->shouldReturn('db911bd3a3dd8bb2ad9eccbcb0a396595a51491d');
    }

    public function it_should_be_castable_to_string()
    {
        $this->__toString()->shouldReturn('db911bd3a3dd8bb2ad9eccbcb0a396595a51491d');
    }
}
