<?php

declare(strict_types=1);

namespace spec\Devboard\GitHub;

use Devboard\GitHub\GitHubInstallation;
use Devboard\GitHub\Installation\ApplicationId;
use Devboard\GitHub\Installation\CreatedAt;
use Devboard\GitHub\Installation\Events;
use Devboard\GitHub\Installation\GitHubInstallationAccessTokenUrl;
use Devboard\GitHub\Installation\GitHubInstallationAccount;
use Devboard\GitHub\Installation\GitHubInstallationHtmlUrl;
use Devboard\GitHub\Installation\GitHubInstallationId;
use Devboard\GitHub\Installation\GitHubInstallationRepositoriesUrl;
use Devboard\GitHub\Installation\Permissions;
use Devboard\GitHub\Installation\RepositorySelection;
use Devboard\GitHub\Installation\UpdatedAt;
use PhpSpec\ObjectBehavior;

class GitHubInstallationSpec extends ObjectBehavior
{
    public function let(
        GitHubInstallationId $installationId,
        GitHubInstallationAccount $installationAccount,
        ApplicationId $applicationId,
        RepositorySelection $repositorySelection,
        Permissions $permissions,
        Events $events,
        GitHubInstallationAccessTokenUrl $accessTokenUrl,
        GitHubInstallationRepositoriesUrl $repositoriesUrl,
        GitHubInstallationHtmlUrl $htmlUrl,
        CreatedAt $createdAt,
        UpdatedAt $updatedAt
    ) {
        $this->beConstructedWith(
            $installationId,
            $installationAccount,
            $applicationId,
            $repositorySelection,
            $permissions,
            $events,
            $accessTokenUrl,
            $repositoriesUrl,
            $htmlUrl,
            $createdAt,
            $updatedAt
        );
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(GitHubInstallation::class);
    }

    public function it_should_expose_all_values_via_getters(
        GitHubInstallationId $installationId,
        GitHubInstallationAccount $installationAccount,
        ApplicationId $applicationId,
        RepositorySelection $repositorySelection,
        Permissions $permissions,
        Events $events,
        GitHubInstallationAccessTokenUrl $accessTokenUrl,
        GitHubInstallationRepositoriesUrl $repositoriesUrl,
        GitHubInstallationHtmlUrl $htmlUrl,
        CreatedAt $createdAt,
        UpdatedAt $updatedAt
    ) {
        $this->getInstallationId()->shouldReturn($installationId);
        $this->getInstallationAccount()->shouldReturn($installationAccount);
        $this->getApplicationId()->shouldReturn($applicationId);
        $this->getRepositorySelection()->shouldReturn($repositorySelection);
        $this->getPermissions()->shouldReturn($permissions);
        $this->getEvents()->shouldReturn($events);
        $this->getAccessTokenUrl()->shouldReturn($accessTokenUrl);
        $this->getRepositoriesUrl()->shouldReturn($repositoriesUrl);
        $this->getHtmlUrl()->shouldReturn($htmlUrl);
        $this->getCreatedAt()->shouldReturn($createdAt);
        $this->getUpdatedAt()->shouldReturn($updatedAt);
    }
}
