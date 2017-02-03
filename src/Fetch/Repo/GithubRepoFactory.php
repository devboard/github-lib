<?php

declare(strict_types=1);

namespace Devboard\Github\Fetch\Repo;

use Devboard\Github\Repo\GithubRepoApiUrl;
use Devboard\Github\Repo\GithubRepoCreatedAt;
use Devboard\Github\Repo\GithubRepoEndpoints;
use Devboard\Github\Repo\GithubRepoFullName;
use Devboard\Github\Repo\GithubRepoHtmlUrl;
use Devboard\Github\Repo\GithubRepoId;
use Devboard\Github\Repo\GithubRepoName;
use Devboard\Github\Repo\GithubRepoOwner;
use Devboard\Github\Repo\GithubRepoPushedAt;
use Devboard\Github\Repo\GithubRepoSize;
use Devboard\Github\Repo\GithubRepoStats;
use Devboard\Github\Repo\GithubRepoTimestamps;
use Devboard\Github\Repo\GithubRepoUpdatedAt;
use Devboard\Github\User\GithubUserApiUrl;
use Devboard\Github\User\GithubUserAvatarUrl;
use Devboard\Github\User\GithubUserGravatarId;
use Devboard\Github\User\GithubUserHtmlUrl;
use Devboard\Github\User\GithubUserId;
use Devboard\Github\User\GithubUserLogin;
use Devboard\Github\User\GithubUserTypeFactory;

/**
 * @see GithubRepoFactorySpec
 * @see GithubRepoFactoryTest
 *
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 */
class GithubRepoFactory
{
    public function create(array $data): GithubRepo
    {
        $repo = new GithubRepo(
            new GithubRepoId($data['id']),
            new GithubRepoFullName(
                new GithubUserLogin($data['owner']['login']),
                new GithubRepoName($data['name'])
            ),
            new GithubRepoOwner(
                new GithubUserId($data['owner']['id']),
                new GithubUserLogin($data['owner']['login']),
                GithubUserTypeFactory::create($data['owner']['type']),
                new GithubUserAvatarUrl($data['owner']['avatar_url']),
                new GithubUserGravatarId($data['owner']['gravatar_id']),
                new GithubUserHtmlUrl($data['owner']['html_url']),
                new GithubUserApiUrl($data['owner']['url']),
                $data['owner']['site_admin']
            ),
            $data['private'],
            new GithubRepoEndpoints(
                new GithubRepoApiUrl($data['url']),
                new GithubRepoHtmlUrl($data['html_url'])
            ),
            new GithubRepoTimestamps(
                new GithubRepoCreatedAt($data['created_at']),
                new GithubRepoUpdatedAt($data['updated_at']),
                new GithubRepoPushedAt($data['pushed_at'])
            ),
            new GithubRepoStats(
                $data['network_count'],
                $data['watchers_count'],
                $data['stargazers_count'],
                $data['open_issues_count'],
                new GithubRepoSize($data['size'])
            )
        );

        return $repo;
    }
}
