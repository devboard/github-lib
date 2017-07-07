<?php

declare(strict_types=1);

namespace spec\DevboardLib\GitHub\Installation;

use DevboardLib\GitHub\Installation\InstallationPermissions;
use PhpSpec\ObjectBehavior;

class InstallationPermissionsSpec extends ObjectBehavior
{
    public function let()
    {
        $input = [
            'contents'      => 'read',
            'deployments'   => 'read',
            'issues'        => 'read',
            'metadata'      => 'read',
            'pull_requests' => 'read',
            'statuses'      => 'read',
        ];

        $this->beConstructedWith($input);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(InstallationPermissions::class);
    }
}
