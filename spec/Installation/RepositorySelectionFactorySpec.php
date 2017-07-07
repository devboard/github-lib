<?php

declare(strict_types=1);

namespace spec\DevboardLib\GitHub\Installation;

use DevboardLib\GitHub\Installation\RepositorySelection\GitHubInstallationRepositoryAll;
use DevboardLib\GitHub\Installation\RepositorySelection\GitHubInstallationRepositorySelected;
use DevboardLib\GitHub\Installation\RepositorySelectionFactory;
use DevboardLib\GitHub\Installation\RepositorySelectionFactoryException;
use PhpSpec\ObjectBehavior;

class RepositorySelectionFactorySpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith();
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(RepositorySelectionFactory::class);
    }

    public function it_will_return_selected()
    {
        $this->create(GitHubInstallationRepositorySelected::NAME)
            ->shouldReturnAnInstanceOf(GitHubInstallationRepositorySelected::class);
    }

    public function it_will_return_all()
    {
        $this->create(GitHubInstallationRepositoryAll::NAME)
            ->shouldReturnAnInstanceOf(GitHubInstallationRepositoryAll::class);
    }

    public function it_will_throw_exception_on_unknown_string()
    {
        $this->shouldThrow(RepositorySelectionFactoryException::class)->duringCreate('SomeRandomName');
    }
}
