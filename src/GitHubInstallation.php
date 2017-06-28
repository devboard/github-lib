<?php

declare(strict_types=1);

namespace Devboard\GitHub;

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

/**
 * @see GitHubInstallationSpec
 * @see GitHubInstallationTest
 * @SuppressWarnings(PHPMD.ExcessiveParameterList)
 */
class GitHubInstallation
{
    /** @var GitHubInstallationId */
    private $installationId;
    /** @var GitHubInstallationAccount */
    private $installationAccount;
    /** @var ApplicationId */
    private $applicationId;
    /** @var RepositorySelection|null */
    private $repositorySelection;
    /** @var Permissions */
    private $permissions;
    /** @var Events */
    private $events;
    /** @var GitHubInstallationAccessTokenUrl */
    private $accessTokenUrl;
    /** @var GitHubInstallationRepositoriesUrl */
    private $repositoriesUrl;
    /** @var GitHubInstallationHtmlUrl */
    private $htmlUrl;
    /** @var CreatedAt */
    private $createdAt;
    /** @var UpdatedAt */
    private $updatedAt;

    public function __construct(
        GitHubInstallationId $installationId,
        GitHubInstallationAccount $installationAccount,
        ApplicationId $applicationId,
        ?RepositorySelection $repositorySelection,
        Permissions $permissions,
        Events $events,
        GitHubInstallationAccessTokenUrl $accessTokenUrl,
        GitHubInstallationRepositoriesUrl $repositoriesUrl,
        GitHubInstallationHtmlUrl $htmlUrl,
        CreatedAt $createdAt,
        UpdatedAt $updatedAt
    ) {
        $this->installationId      = $installationId;
        $this->installationAccount = $installationAccount;
        $this->applicationId       = $applicationId;
        $this->repositorySelection = $repositorySelection;
        $this->permissions         = $permissions;
        $this->events              = $events;
        $this->accessTokenUrl      = $accessTokenUrl;
        $this->repositoriesUrl     = $repositoriesUrl;
        $this->htmlUrl             = $htmlUrl;
        $this->createdAt           = $createdAt;
        $this->updatedAt           = $updatedAt;
    }

    public function getInstallationId(): GitHubInstallationId
    {
        return $this->installationId;
    }

    public function getInstallationAccount(): GitHubInstallationAccount
    {
        return $this->installationAccount;
    }

    public function getApplicationId(): ApplicationId
    {
        return $this->applicationId;
    }

    public function getRepositorySelection(): ?RepositorySelection
    {
        return $this->repositorySelection;
    }

    public function getPermissions(): Permissions
    {
        return $this->permissions;
    }

    public function getEvents(): Events
    {
        return $this->events;
    }

    public function getAccessTokenUrl(): GitHubInstallationAccessTokenUrl
    {
        return $this->accessTokenUrl;
    }

    public function getRepositoriesUrl(): GitHubInstallationRepositoriesUrl
    {
        return $this->repositoriesUrl;
    }

    public function getHtmlUrl(): GitHubInstallationHtmlUrl
    {
        return $this->htmlUrl;
    }

    public function getCreatedAt(): CreatedAt
    {
        return $this->createdAt;
    }

    public function getUpdatedAt(): UpdatedAt
    {
        return $this->updatedAt;
    }
}
