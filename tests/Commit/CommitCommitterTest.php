<?php

declare(strict_types=1);

namespace tests\DevboardLib\GitHub\Commit;

use DevboardLib\GitHub\Account\Type\User;
use DevboardLib\GitHub\Commit\CommitCommitter;
use DevboardLib\GitHub\Commit\CommitCommitterDetails;
use DevboardLib\GitHub\Commit\CommitDate;
use DevboardLib\GitHub\Commit\Committer\CommitCommitterEmail;
use DevboardLib\GitHub\Commit\Committer\CommitCommitterName;
use DevboardLib\GitHub\User\UserApiUrl;
use DevboardLib\GitHub\User\UserAvatarUrl;
use DevboardLib\GitHub\User\UserGravatarId;
use DevboardLib\GitHub\User\UserHtmlUrl;
use DevboardLib\GitHub\User\UserId;
use DevboardLib\GitHub\User\UserLogin;

/**
 * @covers \DevboardLib\GitHub\Commit\CommitCommitter
 * @group  unit
 *
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 */
class CommitCommitterTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider provideCommittersWithDetails
     * @dataProvider provideCommittersWithoutDetails
     */
    public function testCreating(
        CommitCommitterName $name,
        CommitCommitterEmail $email,
        CommitDate $commitDate,
        ?CommitCommitterDetails $committerDetails
    ) {
        $sut = new CommitCommitter($name, $email, $commitDate, $committerDetails);

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
        CommitCommitterName $name,
        CommitCommitterEmail $email,
        CommitDate $commitDate,
        ?CommitCommitterDetails $committerDetails
    ) {
        $sut = new CommitCommitter($name, $email, $commitDate, $committerDetails);

        $serialized = $sut->serialize();

        $this->assertEquals($sut, CommitCommitter::deserialize($serialized));
    }

    /**
     * @dataProvider provideCommittersWithDetails
     */
    public function testCommitterDetailsGettersWhenDetailsExist(
        CommitCommitterName $name,
        CommitCommitterEmail $email,
        CommitDate $commitDate,
        ?CommitCommitterDetails $committerDetails
    ) {
        $sut = new CommitCommitter($name, $email, $commitDate, $committerDetails);

        $this->assertSame($name, $sut->getName());
        $this->assertSame($email, $sut->getEmail());
        $this->assertSame($commitDate, $sut->getCommitDate());
        $this->assertSame($committerDetails, $sut->getCommitterDetails());

        $this->assertSame($committerDetails->getUserId(), $sut->getUserId());
        $this->assertSame($committerDetails->getLogin(), $sut->getLogin());
        $this->assertSame($committerDetails->getAccountType(), $sut->getAccountType());
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
        CommitCommitterName $name,
        CommitCommitterEmail $email,
        CommitDate $commitDate,
        ?CommitCommitterDetails $committerDetails
    ) {
        $sut = new CommitCommitter($name, $email, $commitDate, $committerDetails);

        $this->assertSame($name, $sut->getName());
        $this->assertSame($email, $sut->getEmail());
        $this->assertSame($commitDate, $sut->getCommitDate());
        $this->assertNull($sut->getCommitterDetails());
        $this->assertNull($sut->getUserId());
        $this->assertNull($sut->getLogin());
        $this->assertNull($sut->getAccountType());
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
                ),
            ],
        ];
    }

    public function provideCommittersWithoutDetails(): array
    {
        return [
            [
                new CommitCommitterName('name'),
                new CommitCommitterEmail('nobody@example.com'),
                new CommitDate('2017-02-03 11:22:33'),
                null,
            ],
        ];
    }
}
