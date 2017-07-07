<?php

declare(strict_types=1);

namespace tests\DevboardLib\GitHub;

use DevboardLib\GitHub\Account\Type\User;
use DevboardLib\GitHub\Commit\Author\GitHubCommitAuthorEmail;
use DevboardLib\GitHub\Commit\Author\GitHubCommitAuthorName;
use DevboardLib\GitHub\Commit\Committer\GitHubCommitCommitterEmail;
use DevboardLib\GitHub\Commit\Committer\GitHubCommitCommitterName;
use DevboardLib\GitHub\Commit\GitHubCommitAuthor;
use DevboardLib\GitHub\Commit\GitHubCommitAuthorDetails;
use DevboardLib\GitHub\Commit\GitHubCommitCommitter;
use DevboardLib\GitHub\Commit\GitHubCommitCommitterDetails;
use DevboardLib\GitHub\Commit\GitHubCommitDate;
use DevboardLib\GitHub\Commit\GitHubCommitMessage;
use DevboardLib\GitHub\Commit\GitHubCommitSha;
use DevboardLib\GitHub\GitHubCommit;
use DevboardLib\GitHub\User\UserApiUrl;
use DevboardLib\GitHub\User\UserAvatarUrl;
use DevboardLib\GitHub\User\UserGravatarId;
use DevboardLib\GitHub\User\UserHtmlUrl;
use DevboardLib\GitHub\User\UserId;
use DevboardLib\GitHub\User\UserLogin;

/**
 * @covers \DevboardLib\GitHub\GitHubCommit
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
                        new UserId(13507412),
                        new UserLogin('devboard-test'),
                        new User(),
                        new UserAvatarUrl('https://avatars.Usercontent.com/u/13507412?v=3'),
                        new UserGravatarId(''),
                        new UserHtmlUrl('https://github.com/devboard-test'),
                        new UserApiUrl('https://api.github.com/users/devboard-test'),
                        false
                    )
                ),
                new GitHubCommitCommitter(
                    new GitHubCommitCommitterName('name'),
                    new GitHubCommitCommitterEmail('nobody@example.com'),
                    new GitHubCommitDate('2017-02-03 11:22:33'),
                    new GitHubCommitCommitterDetails(
                        new UserId(13507412),
                        new UserLogin('devboard-test'),
                        new User(),
                        new UserAvatarUrl('https://avatars.Usercontent.com/u/13507412?v=3'),
                        new UserGravatarId(''),
                        new UserHtmlUrl('https://github.com/devboard-test'),
                        new UserApiUrl('https://api.github.com/users/devboard-test'),
                        false
                    )
                ),
            ],
        ];
    }
}
