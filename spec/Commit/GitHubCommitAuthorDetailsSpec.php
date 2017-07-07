<?php

declare(strict_types=1);

namespace spec\DevboardLib\GitHub\Commit;

use DevboardLib\GitHub\Account\GitHubAccountType;
use DevboardLib\GitHub\Commit\GitHubCommitAuthorDetails;
use DevboardLib\GitHub\User\UserApiUrl;
use DevboardLib\GitHub\User\UserAvatarUrl;
use DevboardLib\GitHub\User\UserGravatarId;
use DevboardLib\GitHub\User\UserHtmlUrl;
use DevboardLib\GitHub\User\UserId;
use DevboardLib\GitHub\User\UserLogin;
use PhpSpec\ObjectBehavior;

class GitHubCommitAuthorDetailsSpec extends ObjectBehavior
{
    public function let(
        UserId $userId,
        UserLogin $login,
        GitHubAccountType $gitHubAccountType,
        UserAvatarUrl $avatarUrl,
        UserGravatarId $gravatarId,
        UserHtmlUrl $htmlUrl,
        UserApiUrl $apiUrl
    ) {
        $this->beConstructedWith($userId, $login, $gitHubAccountType, $avatarUrl, $gravatarId, $htmlUrl, $apiUrl, false);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(GitHubCommitAuthorDetails::class);
    }

    public function it_should_expose_all_values_via_getters(
        UserId $userId,
        UserLogin $login,
        GitHubAccountType $gitHubAccountType,
        UserAvatarUrl $avatarUrl,
        UserGravatarId $gravatarId,
        UserHtmlUrl $htmlUrl,
        UserApiUrl $apiUrl
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
