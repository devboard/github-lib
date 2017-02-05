<?php

declare(strict_types=1);

namespace spec\Devboard\GitHub\User\Type;

use Devboard\GitHub\User\GitHubUserType;
use Devboard\GitHub\User\Type\Organization;
use PhpSpec\ObjectBehavior;

class OrganizationSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith();
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(Organization::class);
        $this->shouldImplement(GitHubUserType::class);
    }

    public function it_knows_it_is_organization_and_not_user()
    {
        $this->isOrganization()->shouldReturn(true);
        $this->isUser()->shouldReturn(false);
    }

    public function it_should_expose_value()
    {
        $this->getValue()->shouldReturn('Organization');
    }

    public function it_should_be_castable_to_string()
    {
        $this->__toString()->shouldReturn('Organization');
    }
}
