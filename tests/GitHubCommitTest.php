<?php

declare(strict_types=1);

namespace tests\Devboard\GitHub;

use Devboard\GitHub\Account\Type\User;
use Devboard\GitHub\Commit\Author\GitHubCommitAuthorEmail;
use Devboard\GitHub\Commit\Author\GitHubCommitAuthorName;
use Devboard\GitHub\Commit\Committer\GitHubCommitCommitterEmail;
use Devboard\GitHub\Commit\Committer\GitHubCommitCommitterName;
use Devboard\GitHub\Commit\GitHubCommitAuthor;
use Devboard\GitHub\Commit\GitHubCommitAuthorDetails;
use Devboard\GitHub\Commit\GitHubCommitCommitter;
use Devboard\GitHub\Commit\GitHubCommitCommitterDetails;
use Devboard\GitHub\Commit\GitHubCommitDate;
use Devboard\GitHub\Commit\GitHubCommitMessage;
use Devboard\GitHub\Commit\GitHubCommitSha;
use Devboard\GitHub\GitHubCommit;
use Devboard\GitHub\User\GitHubUserApiUrl;
use Devboard\GitHub\User\GitHubUserAvatarUrl;
use Devboard\GitHub\User\GitHubUserGravatarId;
use Devboard\GitHub\User\GitHubUserHtmlUrl;
use Devboard\GitHub\User\GitHubUserId;
use Devboard\GitHub\User\GitHubUserLogin;

/**
 * @covers \Devboard\GitHub\GitHubCommit
 * @group  unit
 *
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 */
class GitHubCommitTest extends \PHPUnit_Framework_TestCase
{
    /** @dataProvider provideArguments */
    public function testCreating(
        GitHubCommitSha $sha,
        GitHubCommitMessage $message,
        GitHubCommitDate $commitDate,
        GitHubCommitAuthor $author,
        GitHubCommitCommitter $committer
    ) {
        $sut = new GitHubCommit($sha, $message, $commitDate, $author, $committer);

        $this->assertSame($sha, $sut->getSha());
        $this->assertSame($message, $sut->getMessage());
        $this->assertSame($commitDate, $sut->getCommitDate());
        $this->assertSame($author, $sut->getAuthor());
        $this->assertSame($committer, $sut->getCommitter());
    }

    /** @dataProvider provideArguments */
    public function testSerializationAndDeserialization(
        GitHubCommitSha $sha,
        GitHubCommitMessage $message,
        GitHubCommitDate $commitDate,
        GitHubCommitAuthor $author,
        GitHubCommitCommitter $committer
    ) {
        $sut = new GitHubCommit($sha, $message, $commitDate, $author, $committer);

        $serialized = $sut->serialize();

        $this->assertEquals($sut, GitHubCommit::deserialize($serialized));
    }

    public function provideArguments(): array
    {
        return [
            [
                new GitHubCommitSha('abc123'),
                new GitHubCommitMessage('Message'),
                new GitHubCommitDate('2017-02-03 11:22:33'),
                new GitHubCommitAuthor(
                    new GitHubCommitAuthorName('name'),
                    new GitHubCommitAuthorEmail('nobody@example.com'),
                    new GitHubCommitDate('2017-02-03 11:22:33'),
                    new GitHubCommitAuthorDetails(
                        new GitHubUserId(13507412),
                        new GitHubUserLogin('devboard-test'),
                        new User(),
                        new GitHubUserAvatarUrl('https://avatars.githubusercontent.com/u/13507412?v=3'),
                        new GitHubUserGravatarId(''),
                        new GitHubUserHtmlUrl('https://github.com/devboard-test'),
                        new GitHubUserApiUrl('https://api.github.com/users/devboard-test'),
                        false
                    )
                ),
                new GitHubCommitCommitter(
                    new GitHubCommitCommitterName('name'),
                    new GitHubCommitCommitterEmail('nobody@example.com'),
                    new GitHubCommitDate('2017-02-03 11:22:33'),
                    new GitHubCommitCommitterDetails(
                        new GitHubUserId(13507412),
                        new GitHubUserLogin('devboard-test'),
                        new User(),
                        new GitHubUserAvatarUrl('https://avatars.githubusercontent.com/u/13507412?v=3'),
                        new GitHubUserGravatarId(''),
                        new GitHubUserHtmlUrl('https://github.com/devboard-test'),
                        new GitHubUserApiUrl('https://api.github.com/users/devboard-test'),
                        false
                    )
                ),
            ],
        ];
    }
}
