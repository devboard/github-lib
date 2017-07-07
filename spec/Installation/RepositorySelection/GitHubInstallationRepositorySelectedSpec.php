<?php

declare(strict_types=1);

namespace spec\DevboardLib\GitHub\Installation\RepositorySelection;

use DevboardLib\GitHub\Installation\RepositorySelection;
use DevboardLib\GitHub\Installation\RepositorySelection\GitHubInstallationRepositorySelected;
use PhpSpec\ObjectBehavior;

class GitHubInstallationRepositorySelectedSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType(GitHubInstallationRepositorySelected::class);
        $this->shouldImplement(RepositorySelection::class);
    }

    public function it_knows_it_allows_access_to_only_selected_repos()
    {
        $this->selectedOnly()->shouldReturn(true);
        $this->all()->shouldReturn(false);
    }

    public function it_should_expose_value()
    {
        $this->getValue()->shouldReturn('selected');
    }

    public function it_should_be_castable_to_string()
    {
        $this->__toString()->shouldReturn('selected');
    }
}
