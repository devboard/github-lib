<?php

declare(strict_types=1);

namespace tests\Devboard\GitHub\Commit;

use Devboard\GitHub\Account\Type\User;
use Devboard\GitHub\Commit\Committer\GitHubCommitCommitterEmail;
use Devboard\GitHub\Commit\Committer\GitHubCommitCommitterName;
use Devboard\GitHub\Commit\GitHubCommitCommitter;
use Devboard\GitHub\Commit\GitHubCommitCommitterDetails;
use Devboard\GitHub\Commit\GitHubCommitDate;
use Devboard\GitHub\User\GitHubUserApiUrl;
use Devboard\GitHub\User\GitHubUserAvatarUrl;
use Devboard\GitHub\User\GitHubUserGravatarId;
use Devboard\GitHub\User\GitHubUserHtmlUrl;
use Devboard\GitHub\User\GitHubUserId;
use Devboard\GitHub\User\GitHubUserLogin;

/**
 * @covers \Devboard\GitHub\Commit\GitHubCommitCommitter
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
