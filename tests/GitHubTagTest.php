<?php

declare(strict_types=1);

namespace tests\DevboardLib\GitHub;

use DevboardLib\GitHub\Account\AccountLogin;
use DevboardLib\GitHub\Account\Type\User;
use DevboardLib\GitHub\Commit\Author\CommitAuthorEmail;
use DevboardLib\GitHub\Commit\Author\CommitAuthorName;
use DevboardLib\GitHub\Commit\CommitAuthor;
use DevboardLib\GitHub\Commit\CommitAuthorDetails;
use DevboardLib\GitHub\Commit\CommitCommitter;
use DevboardLib\GitHub\Commit\CommitCommitterDetails;
use DevboardLib\GitHub\Commit\CommitDate;
use DevboardLib\GitHub\Commit\CommitMessage;
use DevboardLib\GitHub\Commit\CommitSha;
use DevboardLib\GitHub\Commit\Committer\CommitCommitterEmail;
use DevboardLib\GitHub\Commit\Committer\CommitCommitterName;
use DevboardLib\GitHub\GitHubCommit;
use DevboardLib\GitHub\GitHubTag;
use DevboardLib\GitHub\Repo\RepoFullName;
use DevboardLib\GitHub\Repo\RepoName;
use DevboardLib\GitHub\Tag\TagName;
use DevboardLib\GitHub\User\UserApiUrl;
use DevboardLib\GitHub\User\UserAvatarUrl;
use DevboardLib\GitHub\User\UserGravatarId;
use DevboardLib\GitHub\User\UserHtmlUrl;
use DevboardLib\GitHub\User\UserId;
use DevboardLib\GitHub\User\UserLogin;

/**
 * @covers \DevboardLib\GitHub\GitHubTag
 * @group  unit
 *
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 */
class GitHubTagTest extends \PHPUnit_Framework_TestCase
{
    /** @dataProvider provideData */
    public function testGetters(RepoFullName $repoFullName, TagName $tagName, GitHubCommit $commit)
    {
        $sut = new GitHubTag($repoFullName, $tagName, $commit);

        $this->assertEquals($repoFullName, $sut->getRepoFullName());
        $this->assertEquals($tagName, $sut->getTagName());
        $this->assertEquals($commit, $sut->getCommit());
    }

    /** @dataProvider provideData */
    public function testSerializationAndDeserialization(
        RepoFullName $repoFullName,
        TagName $tagName,
        GitHubCommit $commit
    ) {
        $sut = new GitHubTag($repoFullName, $tagName, $commit);

        $serialized = $sut->serialize();

        $this->assertEquals($sut, GitHubTag::deserialize($serialized));
    }

    public function provideData()
    {
        return [
            [
                new RepoFullName(
                    new AccountLogin('devboard-test'), new RepoName('super-library')
                ),
                new TagName('master'),
                new GitHubCommit(
                    new CommitSha('abc123'),
                    new CommitMessage('Message'),
                    new CommitDate('2017-02-03 11:22:33'),
                    new CommitAuthor(
                        new CommitAuthorName('name'),
                        new CommitAuthorEmail('nobody@example.com'),
                        new CommitDate('2017-02-03 11:22:33'),
                        new CommitAuthorDetails(
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
                    new CommitCommitter(
                        new CommitCommitterName('name'),
                        new CommitCommitterEmail('nobody@example.com'),
                        new CommitDate('2017-02-03 11:22:33'),
                        new CommitCommitterDetails(
                            new UserId(13507412),
                            new UserLogin('devboard-test'),
                            new User(),
                            new UserAvatarUrl('https://avatars.Usercontent.com/u/13507412?v=3'),
                            new UserGravatarId(''),
                            new UserHtmlUrl('https://github.com/devboard-test'),
                            new UserApiUrl('https://api.github.com/users/devboard-test'),
                            false
                        )
                    )
                ),
            ],
        ];
    }
}
