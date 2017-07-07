<?php

declare(strict_types=1);

namespace spec\DevboardLib\GitHub;

use DevboardLib\GitHub\Application\ApplicationId;
use DevboardLib\GitHub\GitHubInstallation;
use DevboardLib\GitHub\Installation\CreatedAt;
use DevboardLib\GitHub\Installation\Events;
use DevboardLib\GitHub\Installation\GitHubInstallationAccessTokenUrl;
use DevboardLib\GitHub\Installation\GitHubInstallationAccount;
use DevboardLib\GitHub\Installation\GitHubInstallationHtmlUrl;
use DevboardLib\GitHub\Installation\GitHubInstallationId;
use DevboardLib\GitHub\Installation\GitHubInstallationRepositoriesUrl;
use DevboardLib\GitHub\Installation\Permissions;
use DevboardLib\GitHub\Installation\RepositorySelection;
use DevboardLib\GitHub\Installation\UpdatedAt;
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
