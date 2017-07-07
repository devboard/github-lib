<?php

declare(strict_types=1);

namespace tests\DevboardLib\GitHub\Commit;

use DevboardLib\GitHub\Account\Type\User;
use DevboardLib\GitHub\Commit\Committer\GitHubCommitCommitterEmail;
use DevboardLib\GitHub\Commit\Committer\GitHubCommitCommitterName;
use DevboardLib\GitHub\Commit\GitHubCommitCommitter;
use DevboardLib\GitHub\Commit\GitHubCommitCommitterDetails;
use DevboardLib\GitHub\Commit\GitHubCommitDate;
use DevboardLib\GitHub\User\GitHubUserApiUrl;
use DevboardLib\GitHub\User\GitHubUserAvatarUrl;
use DevboardLib\GitHub\User\GitHubUserGravatarId;
use DevboardLib\GitHub\User\GitHubUserHtmlUrl;
use DevboardLib\GitHub\User\GitHubUserId;
use DevboardLib\GitHub\User\GitHubUserLogin;

/**
 * @covers \DevboardLib\GitHub\Commit\GitHubCommitCommitter
 * @group  unit
 *
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 */
class GitHubCommitCommitterTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider provideCommittersWithDetails
     * @dataProvider provideCommittersWithoutDetails
     */
    public function testCreating(
        GitHubCommitCommitterName $name,
        GitHubCommitCommitterEmail $email,
        GitHubCommitDate $commitDate,
        ?GitHubCommitCommitterDetails $committerDetails
    ) {
        $sut = new GitHubCommitCommitter($name, $email, $commitDate, $committerDetails);

        $this->assertSame($name, $sut->getName());
        $this->assertSame($email, $sut->getEmail());
        $this->assertSame($commitDate, $sut->getCommitDate());
        $this->assertSame($committerDetails, $sut->getCommitterDetails());
    }

    /**
     * @dataProvider provideCommittersWithDetails
     * @dataProvider provideCommittersWithoutDetails
     */
    public function testSerializationAndDeserialization(
        GitHubCommitCommitterName $name,
        GitHubCommitCommitterEmail $email,
        GitHubCommitDate $commitDate,
        ?GitHubCommitCommitterDetails $committerDetails
    ) {
        $sut = new GitHubCommitCommitter($name, $email, $commitDate, $committerDetails);

        $serialized = $sut->serialize();

        $this->assertEquals($sut, GitHubCommitCommitter::deserialize($serialized));
    }

    /**
     * @dataProvider provideCommittersWithDetails
     */
    public function testCommitterDetailsGettersWhenDetailsExist(
        GitHubCommitCommitterName $name,
        GitHubCommitCommitterEmail $email,
        GitHubCommitDate $commitDate,
        ?GitHubCommitCommitterDetails $committerDetails
    ) {
        $sut = new GitHubCommitCommitter($name, $email, $commitDate, $committerDetails);

        $this->assertSame($name, $sut->getName());
        $this->assertSame($email, $sut->getEmail());
        $this->assertSame($commitDate, $sut->getCommitDate());
        $this->assertSame($committerDetails, $sut->getCommitterDetails());

        $this->assertSame($committerDetails->getUserId(), $sut->getUserId());
        $this->assertSame($committerDetails->getLogin(), $sut->getLogin());
        $this->assertSame($committerDetails->getGitHubAccountType(), $sut->getGitHubAccountType());
        $this->assertSame($committerDetails->getAvatarUrl(), $sut->getAvatarUrl());
        $this->assertSame($committerDetails->getGravatarId(), $sut->getGravatarId());
        $this->assertSame($committerDetails->getHtmlUrl(), $sut->getHtmlUrl());
        $this->assertSame($committerDetails->getApiUrl(), $sut->getApiUrl());
        $this->assertSame($committerDetails->isSiteAdmin(), $sut->isSiteAdmin());
    }

    /**
     * @dataProvider provideCommittersWithoutDetails
     */
    public function testCommitterDetailsGettersWhenNoDetails(
        GitHubCommitCommitterName $name,
        GitHubCommitCommitterEmail $email,
        GitHubCommitDate $commitDate,
        ?GitHubCommitCommitterDetails $committerDetails
    ) {
        $sut = new GitHubCommitCommitter($name, $email, $commitDate, $committerDetails);

        $this->assertSame($name, $sut->getName());
        $this->assertSame($email, $sut->getEmail());
        $this->assertSame($commitDate, $sut->getCommitDate());
        $this->assertNull($sut->getCommitterDetails());
        $this->assertNull($sut->getUserId());
        $this->assertNull($sut->getLogin());
        $this->assertNull($sut->getGitHubAccountType());
        $this->assertNull($sut->getAvatarUrl());
        $this->assertNull($sut->getGravatarId());
        $this->assertNull($sut->getHtmlUrl());
        $this->assertNull($sut->getApiUrl());
        $this->assertNull($sut->isSiteAdmin());
    }

    public function provideCommittersWithDetails(): array
    {
        return [
            [
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
                ),
            ],
        ];
    }

    public function provideCommittersWithoutDetails(): array
    {
        return [
            [
                new GitHubCommitCommitterName('name'),
                new GitHubCommitCommitterEmail('nobody@example.com'),
                new GitHubCommitDate('2017-02-03 11:22:33'),
                null,
            ],
        ];
    }
}
