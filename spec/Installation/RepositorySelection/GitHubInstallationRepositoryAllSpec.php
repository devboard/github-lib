<?php

declare(strict_types=1);

namespace spec\Devboard\GitHub\Installation\RepositorySelection;

use Devboard\GitHub\Installation\RepositorySelection;
use Devboard\GitHub\Installation\RepositorySelection\GitHubInstallationRepositoryAll;
use PhpSpec\ObjectBehavior;

class GitHubInstallationRepositoryAllSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType(GitHubInstallationRepositoryAll::class);
        $this->shouldImplement(RepositorySelection::class);
    }

    public function it_knows_it_allows_access_to_all_repos()
    {
        $this->all()->shouldReturn(true);
        $this->selectedOnly()->shouldReturn(false);
    }

    public function it_should_expose_value()
    {
        $this->getValue()->shouldReturn('all');
    }

    public function it_should_be_castable_to_string()
    {
        $this->__toString()->shouldReturn('all');
    }
}
