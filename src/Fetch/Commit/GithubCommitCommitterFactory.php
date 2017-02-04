<?php

declare(strict_types=1);

namespace Devboard\Github\Fetch\Commit;

use Devboard\Github\Commit\Committer\GithubCommitCommitterEmail;
use Devboard\Github\Commit\Committer\GithubCommitCommitterName;
use Devboard\Github\Commit\GithubCommitDate;
use Devboard\Github\User\GithubUserApiUrl;
use Devboard\Github\User\GithubUserAvatarUrl;
use Devboard\Github\User\GithubUserGravatarId;
use Devboard\Github\User\GithubUserHtmlUrl;
use Devboard\Github\User\GithubUserId;
use Devboard\Github\User\GithubUserLogin;
use Devboard\Github\User\GithubUserTypeFactory;

/**
 * @see GithubCommitCommitterFactorySpec
 * @see GithubCommitCommitterFactoryTest
 */
class GithubCommitCommitterFactory
{
    public function createFromBranchData(array $data): GithubCommitCommitter
    {
        $committerInfo    = $data['commit']['commit']['committer'];
        $committerDetails = $data['commit']['committer'];

        return new GithubCommitCommitter(
            new GithubCommitCommitterName($committerInfo['name']),
            new GithubCommitCommitterEmail($committerInfo['email']),
            new GithubCommitDate($committerInfo['date']),
            new GithubCommitCommitterDetails(
                new GithubUserId($committerDetails['id']),
                new GithubUserLogin($committerDetails['login']),
                GithubUserTypeFactory::create($committerDetails['type']),
                new GithubUserAvatarUrl($committerDetails['avatar_url']),
                new GithubUserGravatarId($committerDetails['gravatar_id']),
                new GithubUserHtmlUrl($committerDetails['html_url']),
                new GithubUserApiUrl($committerDetails['url']),
                $committerDetails['site_admin']
            )
        );
    }
}
