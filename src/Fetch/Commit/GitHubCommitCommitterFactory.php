<?php

declare(strict_types=1);

namespace Devboard\GitHub\Fetch\Commit;

use Devboard\GitHub\Commit\Committer\GitHubCommitCommitterEmail;
use Devboard\GitHub\Commit\Committer\GitHubCommitCommitterName;
use Devboard\GitHub\Commit\GitHubCommitDate;
use Devboard\GitHub\User\GitHubUserApiUrl;
use Devboard\GitHub\User\GitHubUserAvatarUrl;
use Devboard\GitHub\User\GitHubUserGravatarId;
use Devboard\GitHub\User\GitHubUserHtmlUrl;
use Devboard\GitHub\User\GitHubUserId;
use Devboard\GitHub\User\GitHubUserLogin;
use Devboard\GitHub\User\GitHubUserTypeFactory;

/**
 * @see GitHubCommitCommitterFactorySpec
 * @see GitHubCommitCommitterFactoryTest
 */
class GitHubCommitCommitterFactory
{
    public function createFromBranchData(array $data): GitHubCommitCommitter
    {
        $committerInfo    = $data['commit']['commit']['committer'];
        $committerDetails = $data['commit']['committer'];

        return new GitHubCommitCommitter(
            new GitHubCommitCommitterName($committerInfo['name']),
            new GitHubCommitCommitterEmail($committerInfo['email']),
            new GitHubCommitDate($committerInfo['date']),
            new GitHubCommitCommitterDetails(
                new GitHubUserId($committerDetails['id']),
                new GitHubUserLogin($committerDetails['login']),
                GitHubUserTypeFactory::create($committerDetails['type']),
                new GitHubUserAvatarUrl($committerDetails['avatar_url']),
                new GitHubUserGravatarId($committerDetails['gravatar_id']),
                new GitHubUserHtmlUrl($committerDetails['html_url']),
                new GitHubUserApiUrl($committerDetails['url']),
                $committerDetails['site_admin']
            )
        );
    }
}
