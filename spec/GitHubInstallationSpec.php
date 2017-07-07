<?php

declare(strict_types=1);

namespace spec\DevboardLib\GitHub;

use DevboardLib\GitHub\Application\ApplicationId;
use DevboardLib\GitHub\Installation;
use DevboardLib\GitHub\Installation\InstallationAccessTokenUrl;
use DevboardLib\GitHub\Installation\InstallationAccount;
use DevboardLib\GitHub\Installation\InstallationCreatedAt;
use DevboardLib\GitHub\Installation\InstallationEvents;
use DevboardLib\GitHub\Installation\InstallationHtmlUrl;
use DevboardLib\GitHub\Installation\InstallationId;
use DevboardLib\GitHub\Installation\InstallationPermissions;
use DevboardLib\GitHub\Installation\InstallationRepositoriesUrl;
use DevboardLib\GitHub\Installation\InstallationRepositorySelection;
use DevboardLib\GitHub\Installation\InstallationUpdatedAt;
use PhpSpec\ObjectBehavior;

class InstallationSpec extends ObjectBehavior
{
    public function let(
        InstallationId $installationId,
        InstallationAccount $installationAccount,
        ApplicationId $applicationId,
        InstallationRepositorySelection $InstallationRepositorySelection,
        InstallationPermissions $permissions,
        InstallationEvents $events,
        InstallationAccessTokenUrl $accessTokenUrl,
        InstallationRepositoriesUrl $repositoriesUrl,
        InstallationHtmlUrl $htmlUrl,
        InstallationCreatedAt $createdAt,
        InstallationUpdatedAt $updatedAt
    ) {
        $this->beConstructedWith(
            $installationId,
            $installationAccount,
            $applicationId,
            $InstallationRepositorySelection,
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
        $this->shouldHaveType(Installation::class);
    }

    public function it_should_expose_all_values_via_getters(
        InstallationId $installationId,
        InstallationAccount $installationAccount,
        ApplicationId $applicationId,
        InstallationRepositorySelection $InstallationRepositorySelection,
        InstallationPermissions $permissions,
        InstallationEvents $events,
        InstallationAccessTokenUrl $accessTokenUrl,
        InstallationRepositoriesUrl $repositoriesUrl,
        InstallationHtmlUrl $htmlUrl,
        InstallationCreatedAt $createdAt,
        InstallationUpdatedAt $updatedAt
    ) {
        $this->getInstallationId()->shouldReturn($installationId);
        $this->getInstallationAccount()->shouldReturn($installationAccount);
        $this->getApplicationId()->shouldReturn($applicationId);
        $this->getInstallationRepositorySelection()->shouldReturn($InstallationRepositorySelection);
        $this->getPermissions()->shouldReturn($permissions);
        $this->getEvents()->shouldReturn($events);
        $this->getAccessTokenUrl()->shouldReturn($accessTokenUrl);
        $this->getRepositoriesUrl()->shouldReturn($repositoriesUrl);
        $this->getHtmlUrl()->shouldReturn($htmlUrl);
        $this->getCreatedAt()->shouldReturn($createdAt);
        $this->getUpdatedAt()->shouldReturn($updatedAt);
    }
}
