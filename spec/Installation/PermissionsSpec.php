<?php

declare(strict_types=1);

namespace spec\DevboardLib\GitHub\Installation;

use DevboardLib\GitHub\Installation\Permissions;
use PhpSpec\ObjectBehavior;

class PermissionsSpec extends ObjectBehavior
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
        $this->shouldHaveType(Permissions::class);
    }
}
