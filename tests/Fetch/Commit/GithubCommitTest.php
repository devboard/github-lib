<?php

declare(strict_types=1);

namespace tests\Devboard\Github\Fetch\Commit;

use Devboard\Github\Commit\Author\GithubCommitAuthorEmail;
use Devboard\Github\Commit\Author\GithubCommitAuthorName;
use Devboard\Github\Commit\Committer\GithubCommitCommitterEmail;
use Devboard\Github\Commit\Committer\GithubCommitCommitterName;
use Devboard\Github\Commit\GithubCommitDate;
use Devboard\Github\Commit\GithubCommitMessage;
use Devboard\Github\Commit\GithubCommitSha;
use Devboard\Github\Fetch\Commit\GithubCommit;
use Devboard\Github\Fetch\Commit\GithubCommitAuthor;
use Devboard\Github\Fetch\Commit\GithubCommitAuthorDetails;
use Devboard\Github\Fetch\Commit\GithubCommitCommitter;
use Devboard\Github\Fetch\Commit\GithubCommitCommitterDetails;
use Devboard\Github\User\GithubUserApiUrl;
use Devboard\Github\User\GithubUserAvatarUrl;
use Devboard\Github\User\GithubUserGravatarId;
use Devboard\Github\User\GithubUserHtmlUrl;
use Devboard\Github\User\GithubUserId;
use Devboard\Github\User\GithubUserLogin;
use Devboard\Github\User\Type\User;

/**
 * @covers \Devboard\Github\Fetch\Commit\GithubCommit
 * @group  unit
 *
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 */
class GithubCommitTest extends \PHPUnit_Framework_TestCase
{
    /** @dataProvider provideArguments */
    public function testCreating(
        GithubCommitSha $sha,
        GithubCommitMessage $message,
        GithubCommitDate $commitDate,
        GithubCommitAuthor $author,
        GithubCommitCommitter $committer
    ) {
        $sut = new GithubCommit($sha, $message, $commitDate, $author, $committer);

        $this->assertSame($sha, $sut->getSha());
        $this->assertSame($message, $sut->getMessage());
        $this->assertSame($commitDate, $sut->getCommitDate());
        $this->assertSame($author, $sut->getAuthor());
        $this->assertSame($committer, $sut->getCommitter());
    }

    public function provideArguments(): array
    {
        return [
            [
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
                ),
            ],
        ];
    }
}
