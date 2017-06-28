<?php

declare(strict_types=1);

namespace spec\Devboard\GitHub\Installation;

use Devboard\GitHub\Account\GitHubAccountApiUrl;
use Devboard\GitHub\Account\GitHubAccountAvatarUrl;
use Devboard\GitHub\Account\GitHubAccountGravatarId;
use Devboard\GitHub\Account\GitHubAccountHtmlUrl;
use Devboard\GitHub\Account\GitHubAccountId;
use Devboard\GitHub\Account\GitHubAccountLogin;
use Devboard\GitHub\Account\GitHubAccountType;
use Devboard\GitHub\Installation\GitHubInstallationAccount;
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
