<?php

declare(strict_types=1);

namespace tests\Devboard\Github\Fetch\Commit;

use Devboard\Github\Commit\Author\GithubCommitAuthorEmail;
use Devboard\Github\Commit\Author\GithubCommitAuthorName;
use Devboard\Github\Commit\GithubCommitDate;
use Devboard\Github\Fetch\Commit\GithubCommitAuthor;
use Devboard\Github\Fetch\Commit\GithubCommitAuthorDetails;
use Devboard\Github\User\GithubUserApiUrl;
use Devboard\Github\User\GithubUserAvatarUrl;
use Devboard\Github\User\GithubUserGravatarId;
use Devboard\Github\User\GithubUserHtmlUrl;
use Devboard\Github\User\GithubUserId;
use Devboard\Github\User\GithubUserLogin;
use Devboard\Github\User\Type\User;

/**
 * @covers \Devboard\Github\Fetch\Commit\GithubCommitAuthor
 * @group  unit
 *
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 */
class GithubCommitAuthorTest extends \PHPUnit_Framework_TestCase
{
    /** @dataProvider provideArguments */
    public function testCreating(
        GithubCommitAuthorName $name,
        GithubCommitAuthorEmail $email,
        GithubCommitDate $commitDate,
        GithubCommitAuthorDetails $authorDetails
    ) {
        $sut = new GithubCommitAuthor($name, $email, $commitDate, $authorDetails);

        $this->assertSame($name, $sut->getName());
        $this->assertSame($email, $sut->getEmail());
        $this->assertSame($commitDate, $sut->getCommitDate());
        $this->assertSame($authorDetails, $sut->getAuthorDetails());
    }

    public function provideArguments(): array
    {
        return [
            [
                new GithubCommitAuthorName('name'),
                new GithubCommitAuthorEmail('nobody@example.com'),
                new GithubCommitDate(),
                new GithubCommitAuthorDetails(
                    new GithubUserId(13507412),
                    new GithubUserLogin('devboard-test'),
                    new User(),
                    new GithubUserAvatarUrl('https://avatars.githubusercontent.com/u/13507412?v=3'),
                    new GithubUserGravatarId(''),
                    new GithubUserHtmlUrl('https://github.com/devboard-test'),
                    new GithubUserApiUrl('https://api.github.com/users/devboard-test'),
                    false
                ),
            ],
        ];
    }
}
