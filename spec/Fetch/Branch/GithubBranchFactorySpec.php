<?php

declare(strict_types=1);

namespace spec\Devboard\Github\Fetch\Branch;

use Devboard\Github\Fetch\Branch\GithubBranch;
use Devboard\Github\Fetch\Branch\GithubBranchFactory;
use Devboard\Github\Repo\GithubRepoFullName;
use PhpSpec\ObjectBehavior;

class GithubBranchFactorySpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith();
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(GithubBranchFactory::class);
    }

    public function it_will_create_branch_from_given_branch_data(GithubRepoFullName $fullName)
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

        $this->createFromBranchData($fullName, $data)->shouldReturnAnInstanceOf(GithubBranch::class);
    }
}
