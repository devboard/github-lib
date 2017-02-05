<?php

declare(strict_types=1);

namespace spec\Devboard\GitHub\Fetch\Commit;

use Devboard\GitHub\Fetch\Commit\GitHubCommitCommitter;
use Devboard\GitHub\Fetch\Commit\GitHubCommitCommitterFactory;
use PhpSpec\ObjectBehavior;

class GitHubCommitCommitterFactorySpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith();
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(GitHubCommitCommitterFactory::class);
    }

    public function it_will_create_committer_from_given_branch_data()
    {
        $data = [
            'commit' => [
                'commit'    => [
                    'committer' => [
                        'name'  => 'John Smith',
                        'email' => 'nobody@example.com',
                        'date'  => '2012-03-06T23:06:50Z',
                    ],
                ],
                'committer' => [
                    'login'       => 'devboard-test',
                    'id'          => 1,
                    'avatar_url'  => 'avatar-url',
                    'gravatar_id' => '',
                    'url'         => 'github-url',
                    'html_url'    => 'github-html-url',
                    'type'        => 'User',
                    'site_admin'  => false,
                ],
            ],
        ];

        $this->createFromBranchData($data)->shouldReturnAnInstanceOf(GitHubCommitCommitter::class);
    }
}
