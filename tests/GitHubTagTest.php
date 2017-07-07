<?php

declare(strict_types=1);

namespace tests\DevboardLib\GitHub;

use DevboardLib\GitHub\Account\GitHubAccountLogin;
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
use DevboardLib\GitHub\GitHubCommit as Commit;
use DevboardLib\GitHub\GitHubTag;
use DevboardLib\GitHub\Repo\GitHubRepoFullName as RepoFullName;
use DevboardLib\GitHub\Repo\GitHubRepoName;
use DevboardLib\GitHub\Tag\GitHubTagName as TagName;
use DevboardLib\GitHub\User\GitHubUserApiUrl;
use DevboardLib\GitHub\User\GitHubUserAvatarUrl;
use DevboardLib\GitHub\User\GitHubUserGravatarId;
use DevboardLib\GitHub\User\GitHubUserHtmlUrl;
use DevboardLib\GitHub\User\GitHubUserId;
use DevboardLib\GitHub\User\GitHubUserLogin;

/**
 * @covers \DevboardLib\GitHub\GitHubTag
 * @group  unit
 *
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 */
class GitHubTagTest extends \PHPUnit_Framework_TestCase
{
    /** @dataProvider provideData */
    public function testGetters(RepoFullName $repoFullName, TagName $tagName, Commit $commit)
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
        Commit $commit
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
                    new GitHubAccountLogin('devboard-test'), new GitHubRepoName('super-library')
                ),
                new TagName('master'),
                new GitHubCommit(
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
                    )
                ),
            ],
        ];
    }
}
