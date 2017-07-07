<?php

declare(strict_types=1);

namespace spec\DevboardLib\GitHub\Installation;

use DevboardLib\GitHub\Account\GitHubAccountApiUrl;
use DevboardLib\GitHub\Account\GitHubAccountAvatarUrl;
use DevboardLib\GitHub\Account\GitHubAccountGravatarId;
use DevboardLib\GitHub\Account\GitHubAccountHtmlUrl;
use DevboardLib\GitHub\Account\GitHubAccountId;
use DevboardLib\GitHub\Account\GitHubAccountLogin;
use DevboardLib\GitHub\Account\GitHubAccountType;
use DevboardLib\GitHub\Installation\GitHubInstallationAccount;
use PhpSpec\ObjectBehavior;

class GitHubInstallationAccountSpec extends ObjectBehavior
{
    public function let(
        GitHubAccountId $userId,
        GitHubAccountLogin $login,
        GitHubAccountType $gitHubAccountType,
        GitHubAccountAvatarUrl $avatarUrl,
        GitHubAccountGravatarId $gravatarId,
        GitHubAccountHtmlUrl $htmlUrl,
        GitHubAccountApiUrl $apiUrl
    ) {
        $this->beConstructedWith(
            $userId,
            $login,
            $gitHubAccountType,
            $avatarUrl,
            $gravatarId,
            $htmlUrl,
            $apiUrl,
            false
        );
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(GitHubInstallationAccount::class);
    }

    public function it_should_expose_all_values_via_getters(
        GitHubAccountId $userId,
        GitHubAccountLogin $login,
        GitHubAccountType $gitHubAccountType,
        GitHubAccountAvatarUrl $avatarUrl,
        GitHubAccountGravatarId $gravatarId,
        GitHubAccountHtmlUrl $htmlUrl,
        GitHubAccountApiUrl $apiUrl
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
