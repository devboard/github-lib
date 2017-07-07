<?php

declare(strict_types=1);

namespace spec\DevboardLib\GitHub\Commit;

use DevboardLib\GitHub\Account\GitHubAccountType;
use DevboardLib\GitHub\Commit\GitHubCommitCommitterDetails;
use DevboardLib\GitHub\User\GitHubUserApiUrl;
use DevboardLib\GitHub\User\GitHubUserAvatarUrl;
use DevboardLib\GitHub\User\GitHubUserGravatarId;
use DevboardLib\GitHub\User\GitHubUserHtmlUrl;
use DevboardLib\GitHub\User\GitHubUserId;
use DevboardLib\GitHub\User\GitHubUserLogin;
use PhpSpec\ObjectBehavior;

class GitHubCommitCommitterDetailsSpec extends ObjectBehavior
{
    public function let(
        GitHubUserId $userId,
        GitHubUserLogin $login,
        GitHubAccountType $gitHubAccountType,
        GitHubUserAvatarUrl $avatarUrl,
        GitHubUserGravatarId $gravatarId,
        GitHubUserHtmlUrl $htmlUrl,
        GitHubUserApiUrl $apiUrl
    ) {
        $this->beConstructedWith($userId, $login, $gitHubAccountType, $avatarUrl, $gravatarId, $htmlUrl, $apiUrl, false);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(GitHubCommitCommitterDetails::class);
    }

    public function it_should_expose_all_values_via_getters(
        GitHubUserId $userId,
        GitHubUserLogin $login,
        GitHubAccountType $gitHubAccountType,
        GitHubUserAvatarUrl $avatarUrl,
        GitHubUserGravatarId $gravatarId,
        GitHubUserHtmlUrl $htmlUrl,
        GitHubUserApiUrl $apiUrl
    ) {
        $this->getUserId()->shouldReturn($userId);
        $this->getLogin()->shouldReturn($login);
        $this->getGitHubAccountType()->shouldReturn($gitHubAccountType);
        $this->getAvatarUrl()->shouldReturn($avatarUrl);
        $this->getGravatarId()->shouldReturn($gravatarId);
        $this->getHtmlUrl()->shouldReturn($htmlUrl);
        $this->getApiUrl()->shouldReturn($apiUrl);
        $this->isSiteAdmin()->shouldReturn(false);
    }
}
