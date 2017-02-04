<?php

declare(strict_types=1);

namespace tests\Devboard\Github\Fetch\Branch;

use Devboard\Github\Branch\GithubBranchName as BranchName;
use Devboard\Github\Commit\Author\GithubCommitAuthorEmail;
use Devboard\Github\Commit\Author\GithubCommitAuthorName;
use Devboard\Github\Commit\Committer\GithubCommitCommitterEmail;
use Devboard\Github\Commit\Committer\GithubCommitCommitterName;
use Devboard\Github\Commit\GithubCommitDate;
use Devboard\Github\Commit\GithubCommitMessage;
use Devboard\Github\Commit\GithubCommitSha;
use Devboard\Github\Fetch\Branch\GithubBranch;
use Devboard\Github\Fetch\Commit\GithubCommit;
use Devboard\Github\Fetch\Commit\GithubCommit as Commit;
use Devboard\Github\Fetch\Commit\GithubCommitAuthor;
use Devboard\Github\Fetch\Commit\GithubCommitAuthorDetails;
use Devboard\Github\Fetch\Commit\GithubCommitCommitter;
use Devboard\Github\Fetch\Commit\GithubCommitCommitterDetails;
use Devboard\Github\Repo\GithubRepoFullName as RepoFullName;
use Devboard\Github\Repo\GithubRepoName;
use Devboard\Github\User\GithubUserApiUrl;
use Devboard\Github\User\GithubUserAvatarUrl;
use Devboard\Github\User\GithubUserGravatarId;
use Devboard\Github\User\GithubUserHtmlUrl;
use Devboard\Github\User\GithubUserId;
use Devboard\Github\User\GithubUserLogin;
use Devboard\Github\User\Type\User;

/**
 * @covers \Devboard\Github\Fetch\Branch\GithubBranch
 * @group  unit
 *
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 */
class GithubBranchTest extends \PHPUnit_Framework_TestCase
{
    /** @dataProvider provideData */
    public function testGetters(RepoFullName $repoFullName, BranchName $branchName, Commit $commit)
    {
        $sut = new GithubBranch($repoFullName, $branchName, $commit);

        $this->assertEquals($repoFullName, $sut->getRepoFullName());
        $this->assertEquals($branchName, $sut->getBranchName());
        $this->assertEquals($commit, $sut->getCommit());
    }

    public function provideData()
    {
        return [
            [
                new RepoFullName(
                    new GithubUserLogin('devboard-test'), new GithubRepoName('super-library')
                ),
                new BranchName('master'),
                new GithubCommit(
                    new GithubCommitSha('abc123'),
                    new GithubCommitMessage('Message'),
                    new GithubCommitDate(),
                    new GithubCommitAuthor(
                        new GithubCommitAuthorName('name'),
                        new GithubCommitAuthorEmail('nobody@example.com'),
                        new GithubCommitDate(),
                        new GithubCommitAuthorDetails(
                            new GithubUserId(13507412),
                            new GithubUserLogin('devboard-test'),
                            new User(),
                            new GithubUserAvatarUrl('https://avatars.githubusercontent.com/u/13507412?v=3'),
                            new GithubUserGravatarId(''),
                            new GithubUserHtmlUrl('https://github.com/devboard-test'),
                            new GithubUserApiUrl('https://api.github.com/users/devboard-test'),
                            false
                        )
                    ),
                    new GithubCommitCommitter(
                        new GithubCommitCommitterName('name'),
                        new GithubCommitCommitterEmail('nobody@example.com'),
                        new GithubCommitDate(),
                        new GithubCommitCommitterDetails(
                            new GithubUserId(13507412),
                            new GithubUserLogin('devboard-test'),
                            new User(),
                            new GithubUserAvatarUrl('https://avatars.githubusercontent.com/u/13507412?v=3'),
                            new GithubUserGravatarId(''),
                            new GithubUserHtmlUrl('https://github.com/devboard-test'),
                            new GithubUserApiUrl('https://api.github.com/users/devboard-test'),
                            false
                        )
                    )
                ),
            ],
        ];
    }
}
