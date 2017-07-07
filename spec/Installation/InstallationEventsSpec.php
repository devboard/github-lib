<?php

declare(strict_types=1);

namespace spec\DevboardLib\GitHub\Installation;

use DevboardLib\GitHub\Installation\InstallationEvents;
use PhpSpec\ObjectBehavior;

class InstallationEventsSpec extends ObjectBehavior
{
    public function let()
    {
        $input = [
            'commit_comment',
            'create',
            'delete',
            'deployment',
            'deployment_status',
            'fork',
            'issues',
            'issue_comment',
            'label',
            'membership',
            'organization',
            'public',
            'pull_request',
            'pull_request_review',
            'pull_request_review_comment',
            'push',
            'release',
            'repository',
            'status',
            'team',
            'team_add',
            'watch',
        ];

        $this->beConstructedWith($input);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(InstallationEvents::class);
    }
}
