<?php

declare(strict_types=1);

namespace tests\Devboard\GitHub\Commit;

use Devboard\GitHub\Commit\Author\GitHubCommitAuthorEmail;
use Devboard\GitHub\Commit\Author\GitHubCommitAuthorName;
use Devboard\GitHub\Commit\GitHubCommitAuthor;
use Devboard\GitHub\Commit\GitHubCommitAuthorDetails;
use Devboard\GitHub\Commit\GitHubCommitDate;
use Devboard\GitHub\User\GitHubUserApiUrl;
use Devboard\GitHub\User\GitHubUserAvatarUrl;
use Devboard\GitHub\User\GitHubUserGravatarId;
use Devboard\GitHub\User\GitHubUserHtmlUrl;
use Devboard\GitHub\User\GitHubUserId;
use Devboard\GitHub\User\GitHubUserLogin;
use Devboard\GitHub\User\Type\User;

/**
 * @covers \Devboard\GitHub\Commit\GitHubCommitAuthor
 * @group  unit
 *
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 */
class GitHubCommitAuthorTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider provideAuthorsWithDetails
     * @dataProvider provideAuthorsWithoutDetails
     */
    public function testCreating(
        GitHubCommitAuthorName $name,
        GitHubCommitAuthorEmail $email,
        GitHubCommitDate $commitDate,
        ?GitHubCommitAuthorDetails $authorDetails
    ) {
        $sut = new GitHubCommitAuthor($name, $email, $commitDate, $authorDetails);

        $this->assertSame($name, $sut->getName());
        $this->assertSame($email, $sut->getEmail());
        $this->assertSame($commitDate, $sut->getCommitDate());
        $this->assertSame($authorDetails, $sut->getAuthorDetails());
    }

    /**
     * @dataProvider provideAuthorsWithDetails
     * @dataProvider provideAuthorsWithoutDetails
     */
    public function testSerializationAndDeserialization(
        GitHubCommitAuthorName $name,
        GitHubCommitAuthorEmail $email,
        GitHubCommitDate $commitDate,
        ?GitHubCommitAuthorDetails $authorDetails
    ) {
        $sut = new GitHubCommitAuthor($name, $email, $commitDate, $authorDetails);

        $serialized = $sut->serialize();

        $this->assertEquals($sut, GitHubCommitAuthor::deserialize($serialized));
    }

    /**
     * @dataProvider provideAuthorsWithDetails
     */
    public function testAuthorDetailsGettersWhenDetailsExist(
        GitHubCommitAuthorName $name,
        GitHubCommitAuthorEmail $email,
        GitHubCommitDate $commitDate,
        ?GitHubCommitAuthorDetails $authorDetails
    ) {
        $sut = new GitHubCommitAuthor($name, $email, $commitDate, $authorDetails);

        $this->assertSame($name, $sut->getName());
        $this->assertSame($email, $sut->getEmail());
        $this->assertSame($commitDate, $sut->getCommitDate());
        $this->assertSame($authorDetails, $sut->getAuthorDetails());

        $this->assertSame($authorDetails->getUserId(), $sut->getUserId());
        $this->assertSame($authorDetails->getLogin(), $sut->getLogin());
        $this->assertSame($authorDetails->getGitHubUserType(), $sut->getGitHubUserType());
        $this->assertSame($authorDetails->getAvatarUrl(), $sut->getAvatarUrl());
        $this->assertSame($authorDetails->getGravatarId(), $sut->getGravatarId());
        $this->assertSame($authorDetails->getHtmlUrl(), $sut->getHtmlUrl());
        $this->assertSame($authorDetails->getApiUrl(), $sut->getApiUrl());
        $this->assertSame($authorDetails->isSiteAdmin(), $sut->isSiteAdmin());
    }

    /**
     * @dataProvider provideAuthorsWithoutDetails
     */
    public function testAuthorDetailsGettersWhenNoDetails(
        GitHubCommitAuthorName $name,
        GitHubCommitAuthorEmail $email,
        GitHubCommitDate $commitDate,
        ?GitHubCommitAuthorDetails $authorDetails
    ) {
        $sut = new GitHubCommitAuthor($name, $email, $commitDate, $authorDetails);

        $this->assertSame($name, $sut->getName());
        $this->assertSame($email, $sut->getEmail());
        $this->assertSame($commitDate, $sut->getCommitDate());
        $this->assertNull($sut->getAuthorDetails());
        $this->assertNull($sut->getUserId());
        $this->assertNull($sut->getLogin());
        $this->assertNull($sut->getGitHubUserType());
        $this->assertNull($sut->getAvatarUrl());
        $this->assertNull($sut->getGravatarId());
        $this->assertNull($sut->getHtmlUrl());
        $this->assertNull($sut->getApiUrl());
        $this->assertNull($sut->isSiteAdmin());
    }

    public function provideAuthorsWithDetails(): array
    {
        return [
            [
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
                ),
            ],
        ];
    }

    public function provideAuthorsWithoutDetails(): array
    {
        return [
            [
                new GitHubCommitAuthorName('name'),
                new GitHubCommitAuthorEmail('nobody@example.com'),
                new GitHubCommitDate('2017-02-03 11:22:33'),
                null,
            ],
        ];
    }
}
