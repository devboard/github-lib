<?php

declare(strict_types=1);

namespace spec\Devboard\GitHub\Fetch\Branch;

use Devboard\GitHub\Fetch\Branch\GitHubBranchFactory;
use Devboard\GitHub\GitHubBranch;
use Devboard\GitHub\Repo\GitHubRepoFullName;
use PhpSpec\ObjectBehavior;

class GitHubBranchFactorySpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith();
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(GitHubBranchFactory::class);
    }

    public function it_will_create_branch_from_given_branch_data(GitHubRepoFullName $fullName)
    {
        $data = [
            'name'   => 'master',
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

        $this->createFromBranchData($fullName, $data)->shouldReturnAnInstanceOf(GitHubBranch::class);
    }
}
