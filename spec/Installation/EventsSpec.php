<?php

declare(strict_types=1);

namespace spec\Devboard\GitHub\Installation;

use Devboard\GitHub\Installation\Events;
use PhpSpec\ObjectBehavior;

class EventsSpec extends ObjectBehavior
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
        $this->shouldHaveType(Events::class);
    }
}