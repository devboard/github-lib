<?php

declare(strict_types=1);

namespace Devboard\GitHub\Fetch\Repo;

use Devboard\GitHub\GitHubRepo;
use Devboard\GitHub\Repo\GitHubRepoApiUrl;
use Devboard\GitHub\Repo\GitHubRepoCreatedAt;
use Devboard\GitHub\Repo\GitHubRepoEndpoints;
use Devboard\GitHub\Repo\GitHubRepoFullName;
use Devboard\GitHub\Repo\GitHubRepoHtmlUrl;
use Devboard\GitHub\Repo\GitHubRepoId;
use Devboard\GitHub\Repo\GitHubRepoName;
use Devboard\GitHub\Repo\GitHubRepoOwner;
use Devboard\GitHub\Repo\GitHubRepoPushedAt;
use Devboard\GitHub\Repo\GitHubRepoSize;
use Devboard\GitHub\Repo\GitHubRepoStats;
use Devboard\GitHub\Repo\GitHubRepoTimestamps;
use Devboard\GitHub\Repo\GitHubRepoUpdatedAt;
use Devboard\GitHub\User\GitHubUserApiUrl;
use Devboard\GitHub\User\GitHubUserAvatarUrl;
use Devboard\GitHub\User\GitHubUserGravatarId;
use Devboard\GitHub\User\GitHubUserHtmlUrl;
use Devboard\GitHub\User\GitHubUserId;
use Devboard\GitHub\User\GitHubUserLogin;
use Devboard\GitHub\User\GitHubUserTypeFactory;

/**
 * @see GitHubRepoFactorySpec
 * @see GitHubRepoFactoryTest
 *
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 */
class GitHubRepoFactory
{
    public function create(array $data): GitHubRepo
    {
        $repo = new GitHubRepo(
            new GitHubRepoId($data['id']),
            new GitHubRepoFullName(
                new GitHubUserLogin($data['owner']['login']),
                new GitHubRepoName($data['name'])
            ),
            new GitHubRepoOwner(
                new GitHubUserId($data['owner']['id']),
                new GitHubUserLogin($data['owner']['login']),
                GitHubUserTypeFactory::create($data['owner']['type']),
                new GitHubUserAvatarUrl($data['owner']['avatar_url']),
                new GitHubUserGravatarId($data['owner']['gravatar_id']),
                new GitHubUserHtmlUrl($data['owner']['html_url']),
                new GitHubUserApiUrl($data['owner']['url']),
                $data['owner']['site_admin']
            ),
            $data['private'],
            new GitHubRepoEndpoints(
                new GitHubRepoApiUrl($data['url']),
                new GitHubRepoHtmlUrl($data['html_url'])
            ),
            new GitHubRepoTimestamps(
                new GitHubRepoCreatedAt($data['created_at']),
                new GitHubRepoUpdatedAt($data['updated_at']),
                new GitHubRepoPushedAt($data['pushed_at'])
            ),
            new GitHubRepoStats(
                $data['network_count'],
                $data['watchers_count'],
                $data['stargazers_count'],
                $data['open_issues_count'],
                new GitHubRepoSize($data['size'])
            )
        );

        return $repo;
    }
}
