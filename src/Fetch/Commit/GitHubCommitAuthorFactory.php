<?php

declare(strict_types=1);

namespace Devboard\GitHub\Fetch\Commit;

use Devboard\GitHub\Commit\Author\GitHubCommitAuthorEmail;
use Devboard\GitHub\Commit\Author\GitHubCommitAuthorName;
use Devboard\GitHub\Commit\GitHubCommitAuthor;
use Devboard\GitHub\Commit\GitHubCommitAuthorDetails;
use Devboard\GitHub\Commit\GitHubCommitDate;
use Devboard\GitHub\User\GitHubUserApiUrl;
use Devboard\GitHub\User\GitHubUserAvatarUrl;
use Devboard\GitHub\User\GitHubUserGravatarId;
use Devboard\GitHub\User\GitHubUserHtmlUrl;
use Devboard\GitHub\User\GitHubUserId;
use Devboard\GitHub\User\GitHubUserLogin;
use Devboard\GitHub\User\GitHubUserTypeFactory;

/**
 * @see GitHubCommitAuthorFactorySpec
 * @see GitHubCommitAuthorFactoryTest
 */
class GitHubCommitAuthorFactory
{
    public function createFromBranchData(array $data): GitHubCommitAuthor
    {
        $authorInfo    = $data['commit']['commit']['author'];
        $authorDetails = $data['commit']['author'];

        return new GitHubCommitAuthor(
            new GitHubCommitAuthorName($authorInfo['name']),
            new GitHubCommitAuthorEmail($authorInfo['email']),
            new GitHubCommitDate($authorInfo['date']),
            new GitHubCommitAuthorDetails(
                new GitHubUserId($authorDetails['id']),
                new GitHubUserLogin($authorDetails['login']),
                GitHubUserTypeFactory::create($authorDetails['type']),
                new GitHubUserAvatarUrl($authorDetails['avatar_url']),
                new GitHubUserGravatarId($authorDetails['gravatar_id']),
                new GitHubUserHtmlUrl($authorDetails['html_url']),
                new GitHubUserApiUrl($authorDetails['url']),
                $authorDetails['site_admin']
            )
        );
    }
}
