<?php

declare(strict_types=1);

namespace spec\Devboard\Github\Repo;

use Devboard\Github\Repo\GithubRepoOwner;
use Devboard\Github\User\GithubUserApiUrl;
use Devboard\Github\User\GithubUserAvatarUrl;
use Devboard\Github\User\GithubUserGravatarId;
use Devboard\Github\User\GithubUserHtmlUrl;
use Devboard\Github\User\GithubUserId;
use Devboard\Github\User\GithubUserLogin;
use Devboard\Github\User\GithubUserType;
use PhpSpec\ObjectBehavior;

class GithubRepoOwnerSpec extends ObjectBehavior
{
    public function let(
        GithubUserId $userId,
        GithubUserLogin $login,
        GithubUserType $githubUserType,
        GithubUserAvatarUrl $avatarUrl,
        GithubUserGravatarId $gravatarId,
        GithubUserHtmlUrl $htmlUrl,
        GithubUserApiUrl $apiUrl
    ) {
        $this->beConstructedWith(
            $userId,
            $login,
            $githubUserType,
            $avatarUrl,
            $gravatarId,
            $htmlUrl,
            $apiUrl,
            false
        );
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(GithubRepoOwner::class);
    }

    public function it_should_expose_all_values_via_getters(
        GithubUserId $userId,
        GithubUserLogin $login,
        GithubUserType $githubUserType,
        GithubUserAvatarUrl $avatarUrl,
        GithubUserGravatarId $gravatarId,
        GithubUserHtmlUrl $htmlUrl,
        GithubUserApiUrl $apiUrl
    ) {
        $this->getUserId()->shouldReturn($userId);
        $this->getLogin()->shouldReturn($login);
        $this->getGithubUserType()->shouldReturn($githubUserType);
        $this->getAvatarUrl()->shouldReturn($avatarUrl);
        $this->getGravatarId()->shouldReturn($gravatarId);
        $this->getHtmlUrl()->shouldReturn($htmlUrl);
        $this->getApiUrl()->shouldReturn($apiUrl);
        $this->isSiteAdmin()->shouldReturn(false);
    }
}
