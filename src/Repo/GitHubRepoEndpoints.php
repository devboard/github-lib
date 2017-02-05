<?php

declare(strict_types=1);

namespace Devboard\GitHub\Repo;

/**
 * @see GitHubRepoEndpointsSpec
 * @see GitHubRepoEndpointsTest
 */
class GitHubRepoEndpoints
{
    /** @var \Devboard\GitHub\Repo\GitHubRepoApiUrl */
    private $apiUrl;
    /** @var \Devboard\GitHub\Repo\GitHubRepoHtmlUrl */
    private $htmlUrl;

    public function __construct(GitHubRepoApiUrl $apiUrl, GitHubRepoHtmlUrl $htmlUrl)
    {
        $this->apiUrl  = $apiUrl;
        $this->htmlUrl = $htmlUrl;
    }

    public function getApiUrl(): GitHubRepoApiUrl
    {
        return $this->apiUrl;
    }

    public function getHtmlUrl(): GitHubRepoHtmlUrl
    {
        return $this->htmlUrl;
    }

    public function serialize(): array
    {
        return [
            'apiUrl'  => (string) $this->apiUrl,
            'htmlUrl' => (string) $this->htmlUrl,
        ];
    }

    public static function deserialize(array $data): GitHubRepoEndpoints
    {
        return new self(
            new GitHubRepoApiUrl($data['apiUrl']),
            new GitHubRepoHtmlUrl($data['htmlUrl'])
        );
    }
}
