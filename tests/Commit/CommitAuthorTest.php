<?php

declare(strict_types=1);

namespace tests\DevboardLib\GitHub\Commit;

use DevboardLib\GitHub\Account\Type\User;
use DevboardLib\GitHub\Commit\Author\CommitAuthorEmail;
use DevboardLib\GitHub\Commit\Author\CommitAuthorName;
use DevboardLib\GitHub\Commit\CommitAuthor;
use DevboardLib\GitHub\Commit\CommitAuthorDetails;
use DevboardLib\GitHub\Commit\CommitDate;
use DevboardLib\GitHub\User\UserApiUrl;
use DevboardLib\GitHub\User\UserAvatarUrl;
use DevboardLib\GitHub\User\UserGravatarId;
use DevboardLib\GitHub\User\UserHtmlUrl;
use DevboardLib\GitHub\User\UserId;
use DevboardLib\GitHub\User\UserLogin;

/**
 * @covers \DevboardLib\GitHub\Commit\CommitAuthor
 * @group  unit
 *
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 */
class CommitAuthorTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider provideAuthorsWithDetails
     * @dataProvider provideAuthorsWithoutDetails
     */
    public function testCreating(
        CommitAuthorName $name,
        CommitAuthorEmail $email,
        CommitDate $commitDate,
        ?CommitAuthorDetails $authorDetails
    ) {
        $sut = new CommitAuthor($name, $email, $commitDate, $authorDetails);

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
        CommitAuthorName $name,
        CommitAuthorEmail $email,
        CommitDate $commitDate,
        ?CommitAuthorDetails $authorDetails
    ) {
        $sut = new CommitAuthor($name, $email, $commitDate, $authorDetails);

        $serialized = $sut->serialize();

        $this->assertEquals($sut, CommitAuthor::deserialize($serialized));
    }

    /**
     * @dataProvider provideAuthorsWithDetails
     */
    public function testAuthorDetailsGettersWhenDetailsExist(
        CommitAuthorName $name,
        CommitAuthorEmail $email,
        CommitDate $commitDate,
        ?CommitAuthorDetails $authorDetails
    ) {
        $sut = new CommitAuthor($name, $email, $commitDate, $authorDetails);

        $this->assertSame($name, $sut->getName());
        $this->assertSame($email, $sut->getEmail());
        $this->assertSame($commitDate, $sut->getCommitDate());
        $this->assertSame($authorDetails, $sut->getAuthorDetails());

        $this->assertSame($authorDetails->getUserId(), $sut->getUserId());
        $this->assertSame($authorDetails->getLogin(), $sut->getLogin());
        $this->assertSame($authorDetails->getAccountType(), $sut->getAccountType());
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
        CommitAuthorName $name,
        CommitAuthorEmail $email,
        CommitDate $commitDate,
        ?CommitAuthorDetails $authorDetails
    ) {
        $sut = new CommitAuthor($name, $email, $commitDate, $authorDetails);

        $this->assertSame($name, $sut->getName());
        $this->assertSame($email, $sut->getEmail());
        $this->assertSame($commitDate, $sut->getCommitDate());
        $this->assertNull($sut->getAuthorDetails());
        $this->assertNull($sut->getUserId());
        $this->assertNull($sut->getLogin());
        $this->assertNull($sut->getAccountType());
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
                ),
            ],
        ];
    }

    public function provideAuthorsWithoutDetails(): array
    {
        return [
            [
                new CommitAuthorName('name'),
                new CommitAuthorEmail('nobody@example.com'),
                new CommitDate('2017-02-03 11:22:33'),
                null,
            ],
        ];
    }
}
