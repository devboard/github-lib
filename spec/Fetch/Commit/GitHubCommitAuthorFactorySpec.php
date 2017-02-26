<?php

declare(strict_types=1);

namespace spec\Devboard\GitHub\Fetch\Commit;

use Devboard\GitHub\Commit\GitHubCommitAuthor;
use Devboard\GitHub\Fetch\Commit\GitHubCommitAuthorFactory;
use PhpSpec\ObjectBehavior;

class GitHubCommitAuthorFactorySpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType(GitHubCommitAuthorFactory::class);
    }

    public function it_will_create_author_from_given_branch_data()
    {
        $data = [
            'commit' => [
                'commit'    => [
                    'author' => [
                        'name'  => 'John Smith',
                        'email' => 'nobody@example.com',
                        'date'  => '2012-03-06T23:06:50Z',
                    ],
                ],
                'author' => [
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

        $this->createFromBranchData($data)->shouldReturnAnInstanceOf(GitHubCommitAuthor::class);
    }
}
