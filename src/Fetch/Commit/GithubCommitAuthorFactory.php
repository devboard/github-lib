<?php

declare(strict_types=1);

namespace Devboard\Github\Fetch\Commit;

use Devboard\Github\Commit\Author\GithubCommitAuthorEmail;
use Devboard\Github\Commit\Author\GithubCommitAuthorName;
use Devboard\Github\Commit\GithubCommitDate;
use Devboard\Github\User\GithubUserApiUrl;
use Devboard\Github\User\GithubUserAvatarUrl;
use Devboard\Github\User\GithubUserGravatarId;
use Devboard\Github\User\GithubUserHtmlUrl;
use Devboard\Github\User\GithubUserId;
use Devboard\Github\User\GithubUserLogin;
use Devboard\Github\User\GithubUserTypeFactory;

/**
 * @see GithubCommitAuthorFactorySpec
 * @see GithubCommitAuthorFactoryTest
 */
class GithubCommitAuthorFactory
{
    public function createFromBranchData(array $data): GithubCommitAuthor
    {
        $authorInfo    = $data['commit']['commit']['author'];
        $authorDetails = $data['commit']['author'];

        return new GithubCommitAuthor(
            new GithubCommitAuthorName($authorInfo['name']),
            new GithubCommitAuthorEmail($authorInfo['email']),
            new GithubCommitDate($authorInfo['date']),
            new GithubCommitAuthorDetails(
                new GithubUserId($authorDetails['id']),
                new GithubUserLogin($authorDetails['login']),
                GithubUserTypeFactory::create($authorDetails['type']),
                new GithubUserAvatarUrl($authorDetails['avatar_url']),
                new GithubUserGravatarId($authorDetails['gravatar_id']),
                new GithubUserHtmlUrl($authorDetails['html_url']),
                new GithubUserApiUrl($authorDetails['url']),
                $authorDetails['site_admin']
            )
        );
    }
}
