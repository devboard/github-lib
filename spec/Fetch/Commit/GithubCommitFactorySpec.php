<?php

declare(strict_types=1);

namespace spec\Devboard\Github\Fetch\Commit;

use Devboard\Github\Fetch\Commit\GithubCommit;
use Devboard\Github\Fetch\Commit\GithubCommitFactory;
use PhpSpec\ObjectBehavior;

class GithubCommitFactorySpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith();
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(GithubCommitFactory::class);
    }

    public function it_will_create_commit_from_given_branch_data()
    {
        $data = [
            'commit' => [
                'sha'       => 'abc123',
                'commit'    => [
                    'message'   => 'Commit message',
                    'author'    => [
                        'name'  => 'John Smith',
                        'email' => 'nobody@example.com',
                        'date'  => '2012-03-06T23:06:50Z',
                    ],
                    'committer' => [
                        'name'  => 'John Smith',
                        'email' => 'nobody@example.com',
                        'date'  => '2012-03-06T23:06:50Z',
                    ],
                ],
                'author'    => [
                    'login'       => 'devboard-test',
                    'id'          => 1,
                    'avatar_url'  => 'avatar-url',
                    'gravatar_id' => '',
                    'url'         => 'github-url',
                    'html_url'    => 'github-html-url',
                    'type'        => 'User',
                    'site_admin'  => false,
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

        $this->createFromBranchData($data)->shouldReturnAnInstanceOf(GithubCommit::class);
    }
}
