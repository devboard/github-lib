<?php

declare(strict_types=1);

namespace tests\Devboard\GitHub\Fetch\Commit;

use Devboard\GitHub\Commit\Committer\GitHubCommitCommitterEmail;
use Devboard\GitHub\Commit\Committer\GitHubCommitCommitterName;
use Devboard\GitHub\Commit\GitHubCommitDate;
use Devboard\GitHub\Fetch\Commit\GitHubCommitCommitter;
use Devboard\GitHub\Fetch\Commit\GitHubCommitCommitterDetails;
use Devboard\GitHub\User\GitHubUserApiUrl;
use Devboard\GitHub\User\GitHubUserAvatarUrl;
use Devboard\GitHub\User\GitHubUserGravatarId;
use Devboard\GitHub\User\GitHubUserHtmlUrl;
use Devboard\GitHub\User\GitHubUserId;
use Devboard\GitHub\User\GitHubUserLogin;
use Devboard\GitHub\User\Type\User;

/**
 * @covers \Devboard\GitHub\Fetch\Commit\GitHubCommitCommitter
 * @group  unit
 *
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 */
class GitHubCommitCommitterTest extends \PHPUnit_Framework_TestCase
{
    /** @dataProvider provideArguments */
    public function testCreating(
        GitHubCommitCommitterName $name,
        GitHubCommitCommitterEmail $email,
        GitHubCommitDate $commitDate,
        GitHubCommitCommitterDetails $committerDetails
    ) {
        $sut = new GitHubCommitCommitter($name, $email, $commitDate, $committerDetails);

        $this->assertSame($name, $sut->getName());
        $this->assertSame($email, $sut->getEmail());
        $this->assertSame($commitDate, $sut->getCommitDate());
        $this->assertSame($committerDetails, $sut->getCommitterDetails());
    }

    public function provideArguments(): array
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
}
