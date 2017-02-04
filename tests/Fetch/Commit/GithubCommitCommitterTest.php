<?php

declare(strict_types=1);

namespace tests\Devboard\Github\Fetch\Commit;

use Devboard\Github\Commit\Committer\GithubCommitCommitterEmail;
use Devboard\Github\Commit\Committer\GithubCommitCommitterName;
use Devboard\Github\Commit\GithubCommitDate;
use Devboard\Github\Fetch\Commit\GithubCommitCommitter;
use Devboard\Github\Fetch\Commit\GithubCommitCommitterDetails;
use Devboard\Github\User\GithubUserApiUrl;
use Devboard\Github\User\GithubUserAvatarUrl;
use Devboard\Github\User\GithubUserGravatarId;
use Devboard\Github\User\GithubUserHtmlUrl;
use Devboard\Github\User\GithubUserId;
use Devboard\Github\User\GithubUserLogin;
use Devboard\Github\User\Type\User;

/**
 * @covers \Devboard\Github\Fetch\Commit\GithubCommitCommitter
 * @group  unit
 *
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 */
class GithubCommitCommitterTest extends \PHPUnit_Framework_TestCase
{
    /** @dataProvider provideArguments */
    public function testCreating(
        GithubCommitCommitterName $name,
        GithubCommitCommitterEmail $email,
        GithubCommitDate $commitDate,
        GithubCommitCommitterDetails $committerDetails
    ) {
        $sut = new GithubCommitCommitter($name, $email, $commitDate, $committerDetails);

        $this->assertSame($name, $sut->getName());
        $this->assertSame($email, $sut->getEmail());
        $this->assertSame($commitDate, $sut->getCommitDate());
        $this->assertSame($committerDetails, $sut->getCommitterDetails());
    }

    public function provideArguments(): array
    {
        return [
            [
                new GithubCommitCommitterName('name'),
                new GithubCommitCommitterEmail('nobody@example.com'),
                new GithubCommitDate(),
                new GithubCommitCommitterDetails(
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
