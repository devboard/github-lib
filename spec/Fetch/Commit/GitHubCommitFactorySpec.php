<?php

declare(strict_types=1);

namespace spec\Devboard\GitHub\Fetch\Commit;

use Devboard\GitHub\Commit\GitHubCommitAuthor;
use Devboard\GitHub\Commit\GitHubCommitCommitter;
use Devboard\GitHub\Fetch\Commit\GitHubCommitAuthorFactory;
use Devboard\GitHub\Fetch\Commit\GitHubCommitCommitterFactory;
use Devboard\GitHub\Fetch\Commit\GitHubCommitFactory;
use Devboard\GitHub\GitHubCommit;
use PhpSpec\ObjectBehavior;

class GitHubCommitFactorySpec extends ObjectBehavior
{
    public function let(GitHubCommitCommitterFactory $commitCommitterFactory, GitHubCommitAuthorFactory $authorFactory)
    {
        $this->beConstructedWith($commitCommitterFactory, $authorFactory);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(GitHubCommitFactory::class);
    }

    public function it_will_create_commit_from_given_branch_data(
        GitHubCommitCommitterFactory $commitCommitterFactory,
        GitHubCommitAuthorFactory $authorFactory,
        GitHubCommitAuthor $author,
        GitHubCommitCommitter $committer
    ) {
        $data = [
            'commit' => [
                'sha'       => 'abc123',
                'commit'    => [
                    'message'   => 'Commit message',
                    'author'    => [
                        'date'  => '2012-03-06T23:06:50Z',
                    ],
                ],
            ],
        ];

        $commitCommitterFactory->createFromBranchData($data)
            ->shouldBeCalled()
            ->willReturn($committer);
        $authorFactory->createFromBranchData($data)
            ->shouldBeCalled()
            ->willReturn($author);

        $this->createFromBranchData($data)->shouldReturnAnInstanceOf(GitHubCommit::class);
    }
}
