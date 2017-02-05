<?php

declare(strict_types=1);

namespace spec\Devboard\GitHub\Commit;

use Devboard\GitHub\Commit\GitHubCommitSha;
use PhpSpec\ObjectBehavior;

class GitHubCommitShaSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith('db911bd3a3dd8bb2ad9eccbcb0a396595a51491d');
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(GitHubCommitSha::class);
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
