<?php

declare(strict_types=1);

namespace tests\Devboard\GitHub;

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
use Devboard\GitHub\GitHubCommit as Commit;
use Devboard\GitHub\GitHubTag;
use Devboard\GitHub\Repo\GitHubRepoFullName as RepoFullName;
use Devboard\GitHub\Repo\GitHubRepoName;
use Devboard\GitHub\Tag\GitHubTagName as TagName;
use Devboard\GitHub\User\GitHubUserApiUrl;
use Devboard\GitHub\User\GitHubUserAvatarUrl;
use Devboard\GitHub\User\GitHubUserGravatarId;
use Devboard\GitHub\User\GitHubUserHtmlUrl;
use Devboard\GitHub\User\GitHubUserId;
use Devboard\GitHub\User\GitHubUserLogin;
use Devboard\GitHub\User\Type\User;

/**
 * @covers \Devboard\GitHub\GitHubTag
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
                    new GitHubUserLogin('devboard-test'), new GitHubRepoName('super-library')
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
